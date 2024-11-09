<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Infographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfographicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infographics = Infographic::where('user_id', Auth::user()->id)->get();
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
            'user_id' => Auth::user()->id,
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
        $infographic = Infographic::findOrFail($id);
        $indicators = Indicator::all();
        return view('dashboard.infographics._edit', [
            'infographic' => $infographic,
            'indicators' => $indicators,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'indicators' => 'required',
            'filepond' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $infographic = Infographic::findOrFail($id);

        // Proses upload gambar
        if ($request->hasFile('filepond')) {
            if ($infographic->image) {
                Storage::disk('public')->delete($infographic->image);
            }
            $image = $request->file('filepond');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('infographics', $imageName, 'public');
            $infographic->image = $path;
        }

        $infographic->title = $validated['title'];
        $infographic->save();
        $infographic->indicators()->sync($validated['indicators']);

        return redirect()->route('infographics.index')->with('success', 'Infographic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infographic = Infographic::findOrFail($id);
        if ($infographic->image) {
            Storage::disk('public')->delete($infographic->image);
        }
        $infographic->delete();
        $infographic->indicators()->detach();
        return redirect()->route('infographics.index')->with('success', 'Infographic deleted successfully');
    }
}
