<?php

namespace App\Http\Controllers\Tamang;

use App\Http\Controllers\Controller;
use App\Models\Tamang\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $title = get_phrase('Manage Pages');
        $pages = Page::latest()->paginate(10);
        return view('backend.pages.index', compact('title', 'pages'));
    }

    public function create()
    {
        $title = get_phrase('Create Page');
        $pages = Page::whereIn('id', [2, 3, 4, 5, 6])->orderBy('title')->get(['id', 'title']);
        $maxOrder = (Page::max('ord')) + 1;
        return view('backend.pages.create', compact('title', 'pages', 'maxOrder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:4', Rule::unique(Page::class)],
            'description' => ['nullable', 'string', 'max:200']
        ]);

        Page::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'user_id' => auth()->id(),
            'parent' => request('parent', 0),
            'description' => request('description'),
            'content' => request('content'),
            'ord' => request('ord'),
            'showOnMenu' => request('showOnMenu', 0)
        ]);

        flash()->success(get_phrase("Successfully Created"));

        return redirect()->back();
    }

    public function edit(Page $page)
    {
        $title = get_phrase('Edit Page');
        $pages = Page::whereIn('id', [2, 3, 4, 5, 6])->orderBy('title')->get(['id', 'title']);
        $maxOrder = (Page::max('ord')) + 1;
        return view('backend.pages.edit', compact('title', 'pages', 'page', 'maxOrder'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => ['required', 'min:4'],
            'description' => ['nullable', 'string', 'max:200']
        ]);

        $page->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'user_id' => auth()->id(),
            'parent' => request('parent', 0),
            'description' => request('description'),
            'content' => request('content'),
            'ord' => request('ord'),
            'showOnMenu' => request('showOnMenu', 0)
        ]);

        flash()->success(get_phrase("Successfully Updated"));

        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        $subpages = $page->subpages()->count();
        if ($subpages > 0) {
            flash()->error(get_phrase("Subpages exists for this page"));
            return redirect()->back();
        }
        $page->delete();

        flash()->success(get_phrase("Successfully Removed"));

        return redirect()->back();
    }
}
