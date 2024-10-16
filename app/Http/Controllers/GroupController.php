<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Groups; // Assuming you have a Group model
use App\Models\WhatsAppGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Groups::all(); // Fetch all groups
        // dd($request->expectsJson());

        // Return Json res  if its API request
        // if ($request->expectsJson()) {
        //     return ResponseHelper::success(
        //         'success',
        //         'Groups fetched successfully',
        //         $groups
        //     );
        // };

        // return view
        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        $analytics = []; //expected array of analytics
        return view('admin.groups.create', $analytics);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Groups::create($request->all()); // Create a new group
        return redirect()->route('admin.groups.index')->with('success', 'Group created successfully.');
    }

    public function edit($id)
    {
        $group = Groups::findOrFail($id);
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $group = Groups::findOrFail($id);
        $group->update($request->all()); // Update the group
        return redirect()->route('admin.groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroy($id)
    {
        $group = Groups::findOrFail($id);
        $group->delete(); // Delete the group
        return redirect()->route('admin.groups.index')->with('success', 'Group deleted successfully.');
    }
    public function userView()
    {
        $groups = WhatsAppGroup::all();
        return view('user.whatsapp.index', compact('groups'));
    }
}
