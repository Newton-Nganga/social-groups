<?php

namespace App\Http\Controllers;

use App\Models\Script; 
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    // Show all scripts on the frontend
    public function index()
    {
        $scripts = Script::all(); // Get all scripts
        return view('admin.scripts.index', compact('scripts')); // Adjust to your view path
    }

    // Show the form to create a new script
    public function create()
    {
        return view('admin.scripts.create'); // Adjust to the correct path for your form
    }

    // Store a new script
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:js,php,py,txt|max:2048',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('scripts');

        // Create a new script record in the database
        Script::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.scripts.index')->with('success', 'Script created successfully!');
    }

    // Show the form for editing a specific script
    public function edit(Script $script)
    {
        return view('admin.scripts.edit', compact('script'));
    }

    // Update the specified script in the database
    public function update(Request $request, Script $script)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:js,php,py,txt|max:2048', // Allow file to be optional during update
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        // If a new file is uploaded, store it and update the file path
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('scripts');
            $script->file_path = $filePath; // Update the file path in the script
        }

        // Update the rest of the script data
        $script->update($request->only(['title', 'description', 'price', 'category']));

        return redirect()->route('admin.scripts.index')->with('success', 'Script updated successfully.');
    }

    // Delete a specific script
    public function destroy(Script $script)
    {
        $script->delete();
        return redirect()->route('admin.scripts.index')->with('success', 'Script deleted successfully.');
    }
}
