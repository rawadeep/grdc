<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Grievance;
use Illuminate\Http\Request;

class GrievanceController extends Controller
{
    public function index()
    {
        $title = get_phrase("Manage Grievances");
        $rows = Grievance::latest()->paginate(10);
        return view('backend.grievances', compact('title', 'rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:200',
            'contact_number' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string|max:300',
        ]);

        Grievance::create($request->all());

        flash()->success(get_phrase("Successfully Submitted"));

        return redirect()->back();
    }

    public function destroy(Grievance $grievance)
    {
        $grievance->delete();
        flash()->success(get_phrase('Successfully Removed'));
        return redirect()->back();
    }
}
