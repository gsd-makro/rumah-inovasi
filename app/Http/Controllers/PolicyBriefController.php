<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Indicator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PolicyBriefController extends Controller
{
    public function index()
    {
        $policy_briefs = Document::whereHas('indicators', function ($query) {
            if (Auth::user()->role !== 'superadmin') {
                $query->where('user_id', Auth::user()->id);
            }
        })->get();

        return view('dashboard.policy_briefs.index', [
            'policy_briefs' => $policy_briefs,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indicators = Indicator::all();
        return view('dashboard.policy_briefs._add', [
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
            ]);

            if ($request->file('file')) {
                $file = $request->file('file');
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }

                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('policy_briefs', $imageName, 'public');

                $validated['file_path'] = $path;
            }


            // Simpan data infografik ke dalam database
            $policy_brief = Document::create([
                'user_id' => Auth::user()->id,
                'title' => $validated['title'],
                'file_path' => $path,
                'menu_id' => 45,
            ]);

            $policy_brief->indicators()->attach($validated['indicators']);

            return redirect()->route('policy_briefs.index')->with('success', 'Infografis berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('policy_briefs.create')->with('error', 'Infografis gagal dibuat, periksa kembali inputan Anda');
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
        $policy_brief = Document::findOrFail($id);
        $indicators = Indicator::all();
        return view('dashboard.policy_briefs._edit', [
            'policy_brief' => $policy_brief,
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
            ]);
            $policy_brief = Document::find($id);

            if ($request->file('file')) {
                $file = $request->file('file');
                Storage::disk('public')->delete($policy_brief->file_path);
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }

                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('policy_briefs', $imageName, 'public');

                $policy_brief->file_path = $path;
            }

            $policy_brief->title = $validated['title'];
            $policy_brief->save();
            $policy_brief->indicators()->sync($validated['indicators']);

            return redirect()->route('policy_briefs.index')->with('success', 'Policy Brief berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('policy_briefs.edit', $id)->with('error', 'Policy Brief gagal diperbarui, periksa kembali inputan Anda');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $policy_brief = Document::findOrFail($id);
        if ($policy_brief->file_path) {
            Storage::disk('public')->delete($policy_brief->file_path);
        }
        $policy_brief->delete();
        $policy_brief->indicators()->detach();
        return redirect()->route('policy_briefs.index')->with('success', 'Policy Brief berhasil dihapus');
    }

    public function verify(string $id, Request $request)
    {
        $policy_brief = Document::findOrFail($id);
        $policy_brief->status = $request->status;
        $policy_brief->save();

        return redirect()->route('policy_briefs.index')->with('success', 'Policy Brief berhasil diverifikasi');
    }
}
