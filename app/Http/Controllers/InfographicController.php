<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Infographic;
use Illuminate\Http\Request;

class InfographicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infographics = Infographic::all();
        return view('dashboard.infographics.index', [
            'infographics' => $infographics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indicators = Indicator::all();
        return view('dashboard.infographics._add', [
            'indicators' => $indicators,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required',
            'indicators' => 'required',
            'filepond' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Proses upload gambar
        if ($request->hasFile('filepond')) {
            $image = $request->file('filepond');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('infographics', $imageName, 'public');
        }

        // Simpan data infografik ke dalam database
        $infographic = Infographic::create([
            'user_id' => 1,
            'title' => $validated['title'],
            'image' => $path,
        ]);

        $infographic->indicators()->attach($validated['indicators']);

        return redirect()->route('infographics.index')->with('success', 'Infographic created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
