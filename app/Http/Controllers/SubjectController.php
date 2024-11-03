<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('dashboard.subjects.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
            ]);
            Subject::create($validated);
            return redirect()->route('subjects.index')->with('success', 'Subject created successfully');
        } catch (Exception $e) {
            return redirect()->route('subjects.index')->with('error', 'Failed to create subject');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::find($id);
        return view('dashboard.subjects.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        return view('dashboard.subjects.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
            ]);
            Subject::find($id)->update($validated);
            return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
        } catch (Exception $e) {
            return redirect()->route('subjects.index')->with('error', 'Failed to update subject');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Subject::destroy($id);
            return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('subjects.index')->with('error', 'Failed to delete subject');
        }
    }
}
