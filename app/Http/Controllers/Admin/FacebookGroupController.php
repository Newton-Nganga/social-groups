<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacebookGroup;
use Illuminate\Http\Request;

class FacebookGroupController extends Controller
{
    // List all Facebook groups
    public function index() {
        $groups = FacebookGroup::all();
        return view('admin.facebook.index', compact('groups'));
    }

    // Show form to create a new Facebook group
    public function create() {
        return view('admin.facebook.create');
    }

    // Store new Facebook group
    public function store(Request $request) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        FacebookGroup::create([
            'group_name' => $request->group_name,
            'group_link' => $request->group_link,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.facebook.index')->with('success', 'Group created successfully.');
    }

    // Show form to edit an existing Facebook group
    public function edit(FacebookGroup $facebookGroup) {
        return view('admin.facebook.edit', compact('facebookGroup'));
    }

    // Update existing Facebook group
    public function update(Request $request, FacebookGroup $facebookGroup) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        $facebookGroup->update($request->all());

        return redirect()->route('admin.facebook.index')->with('success', 'Group updated successfully.');
    }

    // Delete a Facebook group
    public function destroy(FacebookGroup $facebookGroup) {
        $facebookGroup->delete();
        return redirect()->route('admin.facebook.index')->with('success', 'Group deleted successfully.');
    }
    public function userView() {
        $groups = FacebookGroup::all();
        return view('facebook', compact('groups'));
    }
    
}
