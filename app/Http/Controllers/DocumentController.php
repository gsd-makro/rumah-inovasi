<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Menu;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::whereDoesntHave('indicators');
        if (Auth::user()->role !== 'superadmin') {
            $documents->where('user_id', Auth::user()->id);
        }
        $documents = $documents->get();
        $menus = Menu::WhereDoesntHave('children')->where('is_active', true)->get();
        return view('dashboard.documents.index', [
            'documents' => $documents,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'menu_id' => 'required',
                'title' => 'required|string',
            ]);

            $validated['user_id'] = Auth::user()->id;

            if ($request->file('file_path')) {
                $file = $request->file('file_path');
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }

                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $imageName, 'public');

                $validated['file_path'] = $path;
            }

            Document::create($validated);
            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Dokumen gagal dibuat, periksa kembali inputan anda');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $documents = Document::find($id);
    //     return view('dashboard.documents.show', ['document' => $document]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $documents = Document::find($id);
    //     return view('dashboard.documents.edit', ['document' => $document]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'menu_id' => 'required',
                'title' => 'required|string',
            ]);
            $document = Document::find($id);
            $validated['user_id'] = Auth::user()->id;

            if ($request->file('file_path')) {
                $file = $request->file('file_path');
                Storage::disk('public')->delete($document->file_path);
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }

                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $imageName, 'public');

                $validated['file_path'] = $path;
            }


            $document->update($validated);
            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Dokumen gagal diperbarui, periksa kembali inputan anda');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $document = Document::findOrFail($id);
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $document->delete();
            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Dokumen gagal dihapus');
        }
    }

    public function verify(string $id, Request $request)
    {
        try {
            $document = Document::findOrFail($id);
            $document->status = $request->status;
            $document->save();
            return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diverifikasi');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Dokumen gagal diverifikasi');
        }
    }
}
