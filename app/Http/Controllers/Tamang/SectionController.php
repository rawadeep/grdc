<?php

namespace App\Http\Controllers\Tamang;

use App\Http\Controllers\Controller;
use App\Models\Tamang\Page;
use App\Models\Tamang\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $title = get_phrase("Homepage Sections");
        $sections = Section::latest()->paginate(10);
        return view('backend.sections.index', compact('title', 'sections'));
    }

    public function create()
    {
        $title = get_phrase("Add Section");
        $pages = Page::orderBy('title')->get();
        return view('backend.sections.create', compact('title', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'buttonTitle' => 'nullable|string',
            'linkTo' => 'nullable|string'
        ]);

        Section::create([
            'title' => request('title'),
            'user_id' => auth()->id(),
            'description' => request('description'),
            'buttonTitle' => request('buttonTitle'),
            'linkTo' => request('linkTo'),
            'showOnFront' => request('showOnFront'),
        ]);

        session()->flash('success', get_phrase('Successfully Created'));

        return redirect()->route(prefixed_route('sections.index'));
    }

    public function edit(Section $section)
    {
        $title = get_phrase("Edit Section");
        $pages = Page::orderBy('title')->get();
        return view('backend.sections.edit', compact('title', 'section', 'pages'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'buttonTitle' => 'nullable|string',
            'linkTo' => 'nullable|string',
            'featuredImage' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'dimensions:min_width=175,min_height=175,max_width=500,max_height=500']
        ]);

        $section->update([
            'title' => request('title'),
            'user_id' => auth()->id(),
            'description' => request('description'),
            'buttonTitle' => request('buttonTitle'),
            'linkTo' => request('linkTo'),
            'showOnFront' => request('showOnFront'),
        ]);

        session()->flash('success', get_phrase('Successfully Updated'));

        return redirect()->back();
    }
}
