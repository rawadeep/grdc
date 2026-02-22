<?php

namespace App\Http\Controllers\Nepali;

use App\Http\Controllers\Controller;
use App\Models\Nepali\MediaCoverage;
use App\Models\FileUploader;
use Illuminate\Http\Request;

class MediaCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase('Media Coverage');
        $rows = MediaCoverage::latest()->paginate(10);
        return view('backend.media-coverage.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title  = get_phrase('Create Media Coverage');
        return view('backend.media-coverage.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'featured_image' => 'required|image|max:10000|dimensions:min_width=1200,min_height=500',
            'title' => 'required|string|min:4|max:255|unique:media_coverages,title',
            'short_description' => 'required|string|max:300',
            'published_at' => 'required|date',
            'source' => 'nullable|string',
        ]);

        $filename = FileUploader::upload($request->file('featured_image'), 'uploads/media-coverage', 1400, 600, 420, 200);
        MediaCoverage::create([
            'user_id' => auth()->id(),
            'featured_image' => $filename,
            'title' => $request->title,
            'slug' => slugify($request->title),
            'short_description' => $request->short_description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'source' => $request->source,
            'status' => $request->status ?? 1,
        ]);

        flash()->success(get_phrase(('Successfully Created')));
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
    public function edit(string $id)
    {
        $data['title'] = get_phrase('Edit Media Coverage');
        $data['mediaCoverage'] = MediaCoverage::findOrFail($id);
        return view('backend.media-coverage.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'featured_image' => 'nullable|image|max:10000|dimensions:min_width=1200,min_height=500',
            'title' => 'required|string|min:4|max:255',
            'short_description' => 'required|string|max:300',
            'published_at' => 'required|date',
            'source' => 'nullable|string',
        ]);

        $mediaCoverage = MediaCoverage::findOrFail($id);

        $filename = $mediaCoverage->featured_image;
        if ($request->hasFile('featured_image')) {
            $filename = FileUploader::upload($request->file('featured_image'), 'uploads/media-coverage', 1400, 600, 420, 200);
            remove_image($mediaCoverage->featured_image, 'uploads/media-coverage');
        }

        $mediaCoverage->update([
            'user_id' => auth()->id(),
            'featured_image' => $filename,
            'title' => $request->title,
            'slug' => slugify($request->title),
            'short_description' => $request->short_description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'source' => $request->source,
            'status' => $request->status ?? 1,
        ]);

        flash()->success(get_phrase(('Successfully Updated')));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mediaCoverage = MediaCoverage::findOrFail($id);
        remove_image($mediaCoverage->featured_image, 'uploads/media-coverage');
        $mediaCoverage->delete();
        flash()->success(get_phrase(('Successfully Deleted')));
        return redirect()->back();
    }
}
