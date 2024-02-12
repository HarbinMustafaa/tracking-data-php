<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;

class TrackerController extends Controller
{
    public function index()
    {
        $trackers = Tracker::all();
        return view('trackers.index', compact('trackers'));
    }

    public function create()
    {
        return view('trackers.create');
    }

    public function store(Request $request)
    {
        Tracker::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_finished' => $request->has('is_finished'), 
        ]);

        return redirect()->route('trackers.index');
    }

    public function edit(Tracker $tracker)
    {
        return view('trackers.edit', compact('tracker'));
    }

    public function update(Request $request, Tracker $tracker)
    {
        $tracker->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_finished' => $request->input('is_finished',false), // Set the default value if needed
        ]);

        return redirect()->route('trackers.index');
    }

    public function destroy(Tracker $tracker)
    {
        $tracker->delete();
        return redirect()->route('trackers.index');
    }
    public function markCompleted(Request $request, Tracker $tracker)
    {
        $tracker->update(['is_finished' => true]);

        return redirect()->route('trackers.index');
    }
}
