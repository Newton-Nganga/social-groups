<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TelegramGroup;
use Illuminate\Http\Request;

class TelegramGroupController extends Controller
{
    // List all Telegram groups
    public function index() {
        $groups = TelegramGroup::all();
        return view('admin.telegram.index', compact('groups'));
    }

    // Show form to create a new Telegram group
    public function create() {
        return view('admin.telegram.create');
    }

    // Store new Telegram group
    public function store(Request $request) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        TelegramGroup::create([
            'group_name' => $request->group_name,
            'group_link' => $request->group_link,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.telegram.index')->with('success', 'Group created successfully.');
    }

    // Show form to edit an existing Telegram group
    public function edit(TelegramGroup $telegramGroup) {
        return view('admin.telegram.edit', compact('telegramGroup'));
    }

    // Update existing Telegram group
    public function update(Request $request, TelegramGroup $telegramGroup) {
        $request->validate([
            'group_name' => 'required|string',
            'group_link' => 'required|url',
        ]);

        $telegramGroup->update($request->all());

        return redirect()->route('admin.telegram.index')->with('success', 'Group updated successfully.');
    }

    // Delete a Telegram group
    public function destroy(TelegramGroup $telegramGroup) {
        $telegramGroup->delete();
        return redirect()->route('admin.telegram.index')->with('success', 'Group deleted successfully.');
    }
    public function userView() {
        $groups = TelegramGroup::all();
        return view('user.telegram.index', compact('groups'));
    }
    
}
