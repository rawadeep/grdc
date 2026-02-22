<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $title = get_phrase("Manage Contact Messages");
        $rows = ContactMessage::latest()->paginate(10);
        return view('backend.contact-messages', compact('title', 'rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:200',
            'email' => 'required|email|max:100',
            'organization' => 'nullable|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:300',
        ]);

        ContactMessage::create($request->all());

        flash()->success(get_phrase("Successfully Submitted"));

        return redirect()->back();
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        flash()->success(get_phrase('Successfully Removed'));
        return redirect()->back();
    }
}
