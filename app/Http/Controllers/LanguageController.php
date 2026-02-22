<?php

namespace App\Http\Controllers;

use App\Models\Admin\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manage Languages';
        $lang = session('language', 'en');
        $languages = Language::orderBy('name', 'desc')->orderBy('key', 'desc')->where('name', $lang)->get();
        $name = request('name', $lang);
        return view('backend.languages.index', compact('title', 'languages', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $title = 'Manage Languages';
        $name = request('name', 'en');
        return view('backend.languages.edit', compact('title', 'language', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'value' => 'string|required'
        ]);

        $language->update([
            'value' => request('value')
        ]);

        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->back();
    }
}
