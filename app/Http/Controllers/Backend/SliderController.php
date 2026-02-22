<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $title = get_phrase("Manage Sliders");
        $sliders = Slider::latest()->paginate(10);
        return view('backend.sliders.index', compact('title', 'sliders'));
    }

    public function create()
    {
        $title = get_phrase("Add Slider");
        return view('backend.sliders.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:8', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10000', 'dimensions:min_width=1200,min_height=500'],
        ]);

        $filename = FileUploader::upload($request->file('image'), 'uploads/sliders', 1920, 800);

        Slider::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' => $filename,
            'status' => request('status', 1)
        ]);

        return redirect()->route('sliders.index');
    }

    public function edit(Slider $slider)
    {
        $title = get_phrase("Edit Slider");
        return view('backend.sliders.edit', compact('title', 'slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:8'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:10000', 'dimensions:min_width=1200,min_height=500'],
        ]);

        $filename = $slider->image;
        if ($request->hasFile('image')) {
            $filename = FileUploader::upload($request->file('image'), 'uploads/sliders', 1920, 800);
            remove_image($slider->image, 'uploads/sliders');
        }

        $slider->update([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' => $filename,
            'status' => request('status', 1)
        ]);

        return redirect()->back();
    }

    public function destroy(Slider $slider)
    {
        remove_image($slider->image, 'uploads/sliders');
        $slider->delete();
        return redirect()->back();
    }
}
