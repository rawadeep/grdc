<?php

namespace App\Http\Controllers\Tamang;

use App\Http\Controllers\Controller;
use App\Models\Tamang\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase('Manage Events');
        $rows = Event::latest()->paginate(10);
        return view('backend.events.index', compact('title', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase('Create Event');
        return view('backend.events.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'date' => ['required', 'date'],
            'location' => ['required', 'string'],
        ]);

        Event::create([
            'title' => request('title'),
            'date' => request('date'),
            'location' => request('location'),
            'user_id' => auth()->id(),
        ]);

        flash()->success(get_phrase("Successfully Created"));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $title = get_phrase('Edit Event');
        return view('backend.events.edit', compact('title', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'date' => ['required', 'date'],
            'location' => ['required', 'string'],
        ]);

        $event->update([
            'title' => request('title'),
            'date' => request('date'),
            'location' => request('location'),
            'user_id' => auth()->id(),
        ]);

        flash()->success(get_phrase("Successfully Updated"));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        flash()->success(get_phrase("Successfully Removed"));

        return redirect()->back();
    }
}
