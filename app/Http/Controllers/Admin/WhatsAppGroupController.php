<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsAppGroup;
use Illuminate\Http\Request;

class WhatsAppGroupController extends Controller
{
    // List all WhatsApp groups
    public function index() {
        $groups = WhatsAppGroup::all();
        return view('admin.whatsapp.index', compact('groups'));
    }

    // Show form to create a new group
    public function create() {
        return view('admin.whatsapp.create');
    }

    // Store new group
    public function store(Request $request) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        WhatsAppGroup::create([
            'group_name' => $request->group_name,
            'group_link' => $request->group_link,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.whatsapp.index')->with('success', 'Group created successfully.');
    }

    // Show form to edit an existing group
    public function edit(WhatsAppGroup $whatsappGroup) {
        return view('admin.whatsapp.edit', compact('whatsappGroup'));
    }

    // Update existing group
    public function update(Request $request, WhatsAppGroup $whatsappGroup) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        $whatsappGroup->update($request->all());

        return redirect()->route('admin.whatsapp.index')->with('success', 'Group updated successfully.');
    }

    // Delete a group
    public function destroy(WhatsAppGroup $whatsappGroup) {
        $whatsappGroup->delete();
        return redirect()->route('admin.whatsapp.index')->with('success', 'Group deleted successfully.');
    }
}
