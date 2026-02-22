<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicationRequest;
use App\Models\Backend\Publication;
use App\Models\Backend\PublicationCategory;
use App\Models\FileUploader;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Publications");
        $rows = Publication::latest()->paginate(10);
        return view('backend.publications.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Publication");
        $categories = PublicationCategory::all();
        return view('backend.publications.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('file');
        $filePath = null;

        if ($file && $file->isValid()) {
            try {
                $filePath = FileUploader::upload($file, 'uploads/publications');
            } catch (\Exception $e) {
                Log::error('File upload error: ' . $e->getMessage());
                return back()->withErrors(['file' => 'File upload failed']);
            }
        }

        $data = $request->safe()->except(['file']);
        $data['file_path'] = $filePath;
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($request->title);
        $data['status'] = 1;

        Publication::create($data);
        flash()->success(get_phrase("Successfully created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $title = get_phrase("Edit Publication");
        $categories = PublicationCategory::all();
        return view('backend.publications.edit', compact('title', 'publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePublicationRequest $request, Publication $publication)
    {
        $data = $request->validated();

        $file = $request->file('file');
        $filePath = $publication->file_path;
        if ($file) {
            $filePath = FileUploader::upload($file, 'uploads/publications');
            if ($publication->file_path) {
                remove_image($publication->file_path, 'uploads/publications');
            }
        }

        $data = $request->safe()->except(['file']);
        $data['file_path'] = $filePath;
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($request->title);

        $publication->update($data);
        flash()->success(get_phrase("Successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        if ($publication->file_path) {
            remove_image($publication->file_path, 'uploads/publications');
        }

        $publication->delete();
        flash()->success(get_phrase("Successfully removed"));
        return redirect()->back();
    }
}
