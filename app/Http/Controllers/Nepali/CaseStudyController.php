<?php

namespace App\Http\Controllers\Nepali;

use App\Http\Controllers\Controller;
use App\Models\Nepali\CaseStudy;
use App\Models\Nepali\CaseStudyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Case Studies");
        $rows = CaseStudy::paginate(10);
        return view('backend.case-studies.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Case Study");
        $categories = CaseStudyCategory::all();
        return view('backend.case-studies.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:case_studies',
            'case_study_category_id' => 'required',
            'content' => 'required',
        ]);

        CaseStudy::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'case_study_category_id' => $request->case_study_category_id,
            'slug' => Str::slug(request('title')),
            'content' => $request->content,
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudy $caseStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudy $caseStudy)
    {
        $title = get_phrase("Edit Case Study");
        $categories = CaseStudyCategory::all();
        return view('backend.case-studies.edit', compact('title', 'caseStudy', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseStudy $caseStudy)
    {
        $request->validate([
            'title' => 'required',
            'case_study_category_id' => 'required',
            'content' => 'required',
        ]);

        $caseStudy->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'case_study_category_id' => $request->case_study_category_id,
            'slug' => Str::slug(request('title')),
            'content' => $request->content,
            'status' => request('status', 1),
        ]);

        flash()->success(get_phrase("Successfully updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudy $caseStudy)
    {
        $caseStudy->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
