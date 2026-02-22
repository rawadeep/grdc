<?php

namespace App\Http\Controllers\Nepali;

use App\Http\Controllers\Controller;
use App\Models\Nepali\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase("Manage Notices");
        $rows = Notice::latest()->paginate(10);
        return view('backend.notices.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase("Create Notice");
        return view('backend.notices.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:300',
            'published_at' => 'required|date',
            'content' => 'nullable|string'
        ]);

        Notice::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => auth()->id(),
            'short_description' => $request->short_description,
            'published_at' => $request->published_at,
            'content' => $request->content,
        ]);

        flash()->success(get_phrase("Successfully Created"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $title = get_phrase("Edit Notice");
        return view('backend.notices.edit', compact('title', 'notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:300',
            'published_at' => 'required|date',
            'content' => 'nullable|string'
        ]);

        $notice->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => auth()->id(),
            'short_description' => $request->short_description,
            'published_at' => $request->published_at,
            'content' => $request->content,
        ]);

        flash()->success(get_phrase("Successfully Updated"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        flash()->success(get_phrase("Successfully Removed"));
        return redirect()->back();
    }
}
