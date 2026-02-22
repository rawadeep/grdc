<?php

namespace App\Http\Controllers;

use App\Models\FileUploader;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase('Manage Media');
        $media = Media::latest()->paginate(10);
        return view('backend.media.index', compact('title', 'media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase('Create Media');
        return view('backend.media.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:4', Rule::unique(Media::class)],
            'type' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        $filename = FileUploader::upload($request->file('image'), 'uploads/media');

        Media::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'type' => request('type', "Gallery"),
            'filename' => $filename
        ]);

        session()->flash('success', get_phrase('Successfully Created.'));

        return redirect()->route('media.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        $title = get_phrase('Edit Media');
        return view('backend.media.edit', compact('title', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:4'],
            'type' => ['required', 'string'],
            'image' => ['nullable', 'image']
        ]);

        $media = Media::findOrFail($id);

        $filename = $media->filename;
        if ($request->file('image')) {
            $filename = FileUploader::upload($request->file('image'), 'uploads/media');
            remove_image($media->filename, 'uploads/media');
        }

        $media->update([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'type' => request('type', "Gallery"),
            'filename' => $filename
        ]);

        session()->flash('success', get_phrase('Successfully Updated'));

        return redirect()->route('media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        remove_image($media->filename, 'uploads/media');
        $media->delete();
        session()->flash('success', get_phrase('Successfully Removed'));

        return redirect()->back();
    }
}
