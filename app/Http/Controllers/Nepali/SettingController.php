<?php

namespace App\Http\Controllers\Nepali;

use App\Http\Controllers\Controller;
use App\Models\Nepali\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = get_phrase('Settings');
        $settings = Setting::latest()->get();
        $types = $this->types();
        $groups = $this->groups();
        return view('backend.settings.index', compact('title', 'settings', 'types', 'groups'));
    }

    private function types()
    {
        return [
            'text',
            'number',
            'textarea',
            'image',
            'file'
        ];
    }

    private function groups()
    {
        return [
            'General information',
            'Location',
            'Socials',
            'Footer',
            'Footer Center'
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = get_phrase('Settings');
        $view_path = 'settings.create';
        $settings = Setting::all();
        $types = $this->types();
        $groups = $this->groups();
        return view('backend.settings.create', compact('title', 'settings', 'types', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:settings'
        ]);

        Setting::create([
            'name' => request('name'),
            'key' => Str::slug(request('name'), '_'),
            'value' => request('value'),
            'type' => request('type'),
            'group' => request('group'),
        ]);

        return redirect()->back();
    }

    public function change(Request $request)
    {
        $data = $request->except('_token');
        // Handle dynamic footer links
        if (isset($data['footer_links'])) {
            $links = json_decode($data['footer_links'], true) ?? [];
            $footerLinksSetting = \App\Models\Nepali\Setting::where('key', 'footer_links')->first();
            if ($footerLinksSetting) {
                $footerLinksSetting->update(['value' => json_encode($links)]);
            } else {
                \App\Models\Nepali\Setting::create([
                    'name' => 'Footer Links',
                    'key' => 'footer_links',
                    'value' => json_encode($links),
                    'type' => 'text',
                    'group' => 3, // Default to Socials or Footer group, adjust as needed
                ]);
            }
            unset($data['footer_links']);
            for ($i = 1; $i <= 10; $i++) {
                \App\Models\Nepali\Setting::where('key', 'link_url_' . $i)->delete();
                \App\Models\Nepali\Setting::where('key', 'link_title_' . $i)->delete();
            }
        }
        foreach ($data as $key => $value) {
            \App\Models\Nepali\Setting::where('key', $key)->update(['value' => $value]);
        }
        flash()->success(get_phrase("Successfully Updated"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
