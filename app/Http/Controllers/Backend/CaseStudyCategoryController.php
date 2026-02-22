<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CaseStudyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseStudyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Case Study Categories");
        $rows = CaseStudyCategory::paginate(10);
        return view('backend.case-studies.categories.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Case Study Category");
        return view('backend.case-studies.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:case_study_categories',
            'description' => 'required',
            'icon' => 'required'
        ]);

        CaseStudyCategory::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'description' => $request->description,
            'icon' => $request->icon,
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully Created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudyCategory $caseStudyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudyCategory $caseStudyCategory)
    {
        $title = get_phrase("Edit Case Study Category");
        return view('backend.case-studies.categories.edit', compact('title', 'caseStudyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseStudyCategory $caseStudyCategory)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);

        $caseStudyCategory->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug(request('title')),
            'description' => $request->description,
            'icon' => $request->icon,
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully Updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudyCategory $caseStudyCategory)
    {
        if ($caseStudyCategory->case_studies()->count() > 0) {
            flash()->error(get_phrase("Case Study exist for this category"));
            return redirect()->back();
        }
        $caseStudyCategory->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
