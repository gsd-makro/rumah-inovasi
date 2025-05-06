<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Auth::user()->role == 'superadmin' ? Article::all() : Article::where('user_id', Auth::user()->id)->get();
        return view('dashboard.articles.index', compact('articles'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('dashboard.articles.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'filepond' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'subject_id' => 'required|integer',
            ]);

            $validated['slug'] = Str::slug($$validated['title']);
            $validated['status'] = 'pending';
            $validated['user_id'] = Auth::user()->id;

            if ($request->hasFile('filepond')) {
                $image = $request->file('filepond');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('articles', $imageName, 'public');

                $validated['image'] = $path;
            }

            Article::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'slug' => $validated['slug'],
                'status' => $validated['status'],
                'user_id' => $validated['user_id'],
                'subject_id' => $validated['subject_id'],
                'image' => $validated['image']
            ]);

            return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->route('articles.index')->with('error', 'Artikel gagal dibuat');
        }
    }

    public function show(Request $request, Article $id)
    {
        $article = Article::find($id);
        return view('dashboard.articles.show', ['article' => $article]);
    }


    public function edit(string $id)
    {
        $article = Article::find($id);
        $subjects = Subject::all();
        return view(
            'dashboard.articles.edit',
            [
                'article' => $article,
                'subjects' => $subjects
            ]
        );
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'subject_id' => 'required|integer',
                'filepond' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $article = Article::find($id);

            $validated['slug'] = str_replace(' ', '-', strtolower($request->title));
            $validated['status'] = 'pending';
            $validated['user_id'] = Auth::user()->id;

            if ($request->hasFile('filepond')) {
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                $image = $request->file('filepond');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('articles', $imageName, 'public');

                $article->image = $path;
            }

            $article->title = $validated['title'];
            $article->content = $validated['content'];
            $article->slug = $validated['slug'];
            $article->user_id = $validated['user_id'];
            $article->subject_id = $validated['subject_id'];
            $article->save();


            return redirect()->route('articles.index')->with('success', 'Artikel berhasil diupdate');
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy(string $id)
    {
        try {
            $article = Article::findOrFail($id);
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->route('articles.index')->with('error', 'Artikel gagal dihapus');
        }
    }

    public function verify(string $id, Request $request)
    {
        try {
            $article = Article::findOrFail($id);
            $article->status = $request->status;
            $article->save();
            return redirect()->route('articles.index')->with('success', 'Artikel berhasil diverifikasi');
        } catch (Exception $e) {
            return redirect()->route('articles.index')->with('error', 'Artikel gagal diverifikasi');
        }
    }
}
