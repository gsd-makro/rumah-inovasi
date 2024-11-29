<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Infographic;
use Exception;
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
        $infographics = Auth::user()->role === 'superadmin' ? Infographic::orderBy('created_at', 'desc')->get() : Infographic::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
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
        try {
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
                'menu_id' => 5,
            ]);

            $infographic->indicators()->attach($validated['indicators']);

            return redirect()->route('infographics.index')->with('success', 'Infografis berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('infographics.create')->with('error', 'Infografis gagal dibuat, periksa kembali inputan Anda');
        }
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
        try {
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
            $infographic->menu_id = 5;
            $infographic->save();
            $infographic->indicators()->sync($validated['indicators']);

            return redirect()->route('infographics.index')->with('success', 'Infografis berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('infographics.edit', $id)->with('error', 'Infografis gagal diperbarui, periksa kembali inputan Anda');
        }
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
        return redirect()->route('infographics.index')->with('success', 'Infografis berhasil dihapus');
    }

    public function verify(string $id, Request $request)
    {
        $infographic = Infographic::findOrFail($id);
        $infographic->status = $request->status;
        $infographic->published_at = $request->status === 'rejected' ? null : now();
        $infographic->save();

        return redirect()->route('infographics.index')->with('success', 'Infografis berhasil diverifikasi');
    }
}
