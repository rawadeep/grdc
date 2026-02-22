<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProjectDescription;
use App\Services\FormService;
use Illuminate\Http\Request;

class ProjectDescriptionController extends Controller
{
    public $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Project Descriptions");
        $rows = ProjectDescription::latest()->where('type', 'descriptions')->paginate(10);
        return view('backend.projects.descriptions.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase('Create Project Description');
        $maxOrder = FormService::maxOrder('descriptions');
        return view('backend.projects.descriptions.create', compact('title', 'maxOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'order' => 'required',
            'icon' => 'required',
            'description' => 'required'
        ]);

        ProjectDescription::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'ord' => $request->order,
            'icon' => $request->icon,
            'description' => $request->description,
            'type' => 'descriptions'
        ]);

        flash()->success(get_phrase("Successfully created"));
        return redirect()->route('project-descriptions.index');
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
    public function edit(ProjectDescription $projectDescription)
    {
        $title = get_phrase('Edit Project Description');
        return view('backend.projects.descriptions.edit', compact('title', 'projectDescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectDescription $projectDescription)
    {
        $request->validate([
            'title' => 'required|string',
            'order' => 'required',
            'icon' => 'required',
            'description' => 'required'
        ]);

        $projectDescription->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'ord' => $request->order,
            'icon' => $request->icon,
            'description' => $request->description,
            'type' => 'descriptions'
        ]);

        flash()->success(get_phrase("Successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectDescription $projectDescription)
    {
        $projectDescription->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
