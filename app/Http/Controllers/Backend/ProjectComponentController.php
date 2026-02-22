<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProjectComponent;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Project Components");
        $rows = ProjectComponent::latest()->paginate(10);
        return view('backend.projects.components.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Project Component");
        return view('backend.projects.components.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'featured_image' => 'required|image|max:5000',
            'short_description' => 'required',
            'content' => 'required',
            'project_framework_description' => 'required',
            'project_outcomes' => 'required',
            'project_outputs' => 'required',
            'icon' => 'required'
        ]);

        $filename = FileUploader::upload($request->file('image'), 'uploads/components');

        ProjectComponent::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'featured_image' => $filename,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'icon' => $request->icon,
            'project_framework_description' => $request->project_framework_description,
            'project_outcomes' => json_encode($request->project_outcomes),
            'project_outputs' => json_encode($request->project_outputs),
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully Created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectComponent $projectComponent)
    {
        $title = get_phrase("Edit Project Components");
        return view('backend.projects.components.edit', compact('title', 'projectComponent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectComponent $projectComponent)
    {
        $request->validate([
            'title' => 'required',
            'featured_image' => 'nullable|image|max:5000',
            'short_description' => 'required',
            'content' => 'required',
            'project_framework_description' => 'required',
            'project_outcomes' => 'required',
            'project_outputs' => 'required',
            'icon' => 'required',
        ]);

        $filename = $projectComponent->featured_image;
        if ($request->hasFile('featured_image')) {
            $filename = FileUploader::upload($request->file('featured_image'), 'uploads/components');
            remove_image($projectComponent->featured_image, 'uploads/components');
        }

        $projectComponent->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'featured_image' => $filename,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'icon' => $request->icon,
            'project_framework_description' => $request->project_framework_description,
            'project_outcomes' => json_encode($request->project_outcomes),
            'project_outputs' => json_encode($request->project_outputs),
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully Updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectComponent $projectComponent)
    {
        remove_image($projectComponent->featured_image, 'uploads/components');
        $projectComponent->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
