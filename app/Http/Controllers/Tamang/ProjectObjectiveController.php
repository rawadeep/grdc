<?php

namespace App\Http\Controllers\Tamang;

use App\Http\Controllers\Controller;
use App\Models\Tamang\ProjectObjective;
use App\Services\FormService;
use Illuminate\Http\Request;

class ProjectObjectiveController extends Controller
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
        $title = get_phrase("Manage Project Objectives");
        $rows = ProjectObjective::latest()->where('type', 'objectives')->paginate(10);
        return view('backend.projects.objectives.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase('Create Project Objectives');
        $maxOrder = FormService::maxOrder('objectives');
        return view('backend.projects.objectives.create', compact('title', 'maxOrder'));
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

        ProjectObjective::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'ord' => $request->order,
            'icon' => $request->icon,
            'description' => $request->description,
            'type' => 'objectives'
        ]);

        flash()->success(get_phrase("Successfully Created"));
        return redirect()->route(prefixed_route('project-objectives.index'));
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
    public function edit(ProjectObjective $projectObjective)
    {
        $title = get_phrase('Edit Project Objectives');
        return view('backend.projects.objectives.edit', compact('title', 'projectObjective'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectObjective $projectObjective)
    {
        $request->validate([
            'title' => 'required|string',
            'order' => 'required',
            'icon' => 'required',
            'description' => 'required'
        ]);

        $projectObjective->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'ord' => $request->order,
            'icon' => $request->icon,
            'description' => $request->description,
            'type' => 'objectives'
        ]);

        flash()->success(get_phrase("Successfully Updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectObjective $projectObjective)
    {
        $projectObjective->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
