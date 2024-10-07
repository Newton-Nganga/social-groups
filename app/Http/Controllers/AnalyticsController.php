<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analytics = Analytics::all();
        return view('admin.analytics.index', compact('analytics'));
    }

    public function edit($id)
    {
        $data = Analytics::findOrFail($id);
        return view('admin.analytics.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Analytics::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('analytics.index')->with('success', 'Analytics updated successfully');
    }

    public function destroy($id)
    {
        $data = Analytics::findOrFail($id);
        $data->delete();
        return redirect()->route('analytics.index')->with('success', 'Analytics deleted successfully');
    }
}

