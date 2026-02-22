<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PublicationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Publication Categories");
        $rows = PublicationCategory::paginate(10);
        return view('backend.publications.categories.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Publication Category");
        return view('backend.publications.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:publication_categories',
        ]);

        PublicationCategory::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicationCategory $publicationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicationCategory $publicationCategory)
    {
        $title = get_phrase("Edit Publication Category");
        return view('backend.publications.categories.edit', compact('title', 'publicationCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicationCategory $publicationCategory)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $publicationCategory->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicationCategory $publicationCategory)
    {
        if ($publicationCategory->publications()->count() > 0) {
            flash()->error(get_phrase("Publication exist for this category"));
            return redirect()->back();
        }
        $publicationCategory->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
