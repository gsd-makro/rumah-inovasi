<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Video;
use Cohensive\OEmbed\Facades\OEmbed;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Auth::user()->role === 'superadmin' ? Video::all() : Video::where('user_id', Auth::user()->id)->get();
        $menus = Menu::WhereDoesntHave('children')->where('is_active', true)->get();

        // Proses setiap video untuk mendapatkan embed HTML
        foreach ($videos as $video) {
            if ($video->link_path) {
                $embed = OEmbed::get($video->link_path);
                if ($embed) {
                    // Tambahkan property embed_html ke setiap video object
                    $video->embed_html = $embed->html([
                        'width' => 770,  // Sesuaikan ukuran yang diinginkan
                        'height' => 500
                    ]);
                } else {
                    $video->embed_html = null;
                }
            }
        }

        return view('dashboard.videos.index', [
            'videos' => $videos,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'link_path' => 'required|string',
            ]);

            $validated['user_id'] = Auth::user()->id;
            $validated['menu_id'] = 18;
            Video::create($validated);
            return redirect()->route('videos.index')->with('success', 'Video berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video gagal dibuat, periksa kembali inputan anda');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $videos = Document::find($id);
    //     return view('dashboard.videos.show', ['document' => $document]);
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
                'title' => 'required|string',
                'link_path' => 'required|string',
            ]);

            $validated['user_id'] = Auth::user()->id;
            $validated['menu_id'] = 18;
            $video = Video::find($id);
            $video->update($validated);
            return redirect()->route('videos.index')->with('success', 'Video berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video gagal diperbarui, periksa kembali inputan anda');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video gagal dihapus');
        }
    }

    public function verify(string $id, Request $request)
    {
        try {
            $video = Video::findOrFail($id);
            $video->status = $request->status;
            $video->save();
            return redirect()->route('videos.index')->with('success', 'Video berhasil diverifikasi');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video gagal diverifikasi');
        }
    }
}
