<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectResourceRequest;
use App\Models\Backend\ProjectResource;
use App\Models\FileUploader;
use Illuminate\Support\Str;

class ProjectResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Resources");
        $gettype = request('type', 1);
        $type = $gettype == 3 ? 'Knowledge Products' : ($gettype == 2 ? 'Data & Analytics' : ($gettype == 4 ? 'Notices' : 'Report'));
        $rows = ProjectResource::latest()->where('type', $type)->paginate(10);
        return view('backend.projects.resources.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Resource");
        return view('backend.projects.resources.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectResourceRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('file');
        $filePath = null;
        if ($file) {
            $filePath = FileUploader::upload($file, 'uploads/resources');
        }

        $data = $request->safe()->except(['file']);
        $data['file_path'] = $filePath;
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($request->title);

        ProjectResource::create($data);

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
    public function edit(ProjectResource $projectResource)
    {
        $title = get_phrase("Edit Resource");
        return view('backend.projects.resources.edit', compact('title', 'projectResource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectResourceRequest $request, ProjectResource $projectResource)
    {
        $data = $request->validated();

        $file = $request->file('file');
        $filePath = $projectResource->file_path;
        if ($file) {
            $filePath = FileUploader::upload($file, 'uploads/resources');
            if ($projectResource->file_path) {
                remove_image($projectResource->file_path, 'uploads/resources');
            }
        }

        $data = $request->safe()->except(['file']);
        $data['file_path'] = $filePath;
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($request->title);

        $projectResource->update($data);
        flash()->success(get_phrase("Successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectResource $projectResource)
    {
        if ($projectResource->file_path) {
            remove_image($projectResource->file_path, 'uploads/resources');
        }

        $projectResource->delete();
        flash()->success(get_phrase("Successfully removed"));
        return redirect()->back();
    }
}
