<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Auth::user()->role === 'superadmin' ? Photo::all() : Photo::where('user_id', Auth::user()->id)->get();
        return view('dashboard.photos.index', [
            'photos' => $photos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.photos._add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'filepond' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $validated['user_id'] = Auth::user()->id;

            if ($request->file('filepond')) {
                $file = $request->file('filepond');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('photos', $imageName, 'public');

                $validated['filepond'] = $path;
            }

            Photo::create([
                'user_id' => Auth::user()->id,
                'menu_id' => 17,
                'title' => $validated['title'],
                'file_path' => $validated['filepond']
            ]);
            return redirect()->route('photos.index')->with('success', 'Foto berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('photos.index')->with('error', 'Foto gagal dibuat, periksa kembali inputan anda');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Photo::findOrFail($id);
        return view('dashboard.photos._edit', [
            'photo' => $photo,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'filepond' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $photo = Photo::findOrFail($id);

            // Proses upload gambar
            if ($request->hasFile('filepond')) {
                if ($photo->file_path) {
                    Storage::disk('public')->delete($photo->file_path);
                }
                $image = $request->file('filepond');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('photos', $imageName, 'public');
                $photo->file_path = $path;
            }

            $photo->title = $validated['title'];
            $photo->menu_id = 17;
            $photo->save();
            return redirect()->route('photos.index')->with('success', 'Foto berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('photos.index')->with('error', 'Foto gagal diperbarui, periksa kembali inputan anda');
        }
    }

    public function destroy(string $id)
    {
        try {
            $photo = Photo::findOrFail($id);
            if ($photo->file_path) {
                Storage::disk('public')->delete($photo->file_path);
            }
            $photo->delete();
            return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('photos.index')->with('error', 'Foto gagal dihapus');
        }
    }

    public function verify(string $id, Request $request)
    {
        try {
            $photo = Photo::findOrFail($id);
            $photo->status = $request->status;
            $photo->save();
            return redirect()->route('photos.index')->with('success', 'Foto berhasil diverifikasi');
        } catch (Exception $e) {
            return redirect()->route('photos.index')->with('error', 'Foto gagal diverifikasi');
        }
    }
}
