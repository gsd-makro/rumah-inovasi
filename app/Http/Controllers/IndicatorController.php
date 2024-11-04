<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indicators = Indicator::with('subject')->orderBy('updated_at', 'desc')->get();
        $subjects = Subject::all();
        return view(
            'dashboard.indicators.index',
            [
                'indicators' => $indicators,
                'subjects' => $subjects
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.indicators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'subject_id' => 'required|exists:subjects,id',
            ]);
            Indicator::create($validated);
            return redirect()->route('indicators.index')->with('success', 'Indicator created successfully');
        } catch (Exception $e) {
            return redirect()->route('indicators.index')->with('error', 'Failed to create indicator');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $indicator = Indicator::find($id);
        return view('dashboard.indicators.show', ['indicator' => $indicator]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $indicator = Indicator::find($id);
        return view('dashboard.indicators.edit', ['indicator' => $indicator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'subject_id' => 'required|exists:subjects,id',
            ]);
            Indicator::find($id)->update($validated);
            return redirect()->route('indicators.index')->with('success', 'Indicator updated successfully');
        } catch (Exception $e) {
            return redirect()->route('indicators.index')->with('error', 'Failed to update indicator');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Indicator::destroy($id);
            return redirect()->route('indicators.index')->with('success', 'Indicator deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('indicators.index')->with('error', 'Failed to delete indicator');
        }
    }
}
