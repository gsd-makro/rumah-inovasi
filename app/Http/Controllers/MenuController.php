<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Indicator;
use App\Models\Infographic;
use App\Models\Menu;
use App\Models\Photo;
use App\Models\Subject;
use App\Models\Video;
use Cohensive\OEmbed\Facades\OEmbed;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $menus = Menu::whereNull('parent_id')->with(['children' => function ($query) {
      $query->orderBy('order')->with(['children' => function ($query) {
        $query->orderBy('order');
      }]);
    }])->orderBy('order')->get();
    return view('dashboard.menus.index', ['menus' => $menus]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.menus.create');
  }

  /**
   * Store a newly created resource in storage.
   */

  public function store(Request $request)
  {
    try {
      $validated = $request->validate([
        'name' => 'required|string',
        'title' => 'required|string',
        'content_type' => 'nullable|string',
        'parent_id' => 'nullable|exists:menus,id',
      ]);

      $validated['slug'] = Str::slug($validated['name']);

      // Buat URL berdasarkan hierarki parent
      $urlParts = [];
      if ($validated['parent_id'] !== null) {
        $parent = Menu::find($validated['parent_id']);

        // Update URL parent menjadi # karena sekarang memiliki child
        $parent->update(['url' => '#']);

        // Kumpulkan semua parent dari hierarki teratas ke bawah
        $parentHierarchy = [];
        $currentParent = $parent;
        while ($currentParent) {
          array_unshift($parentHierarchy, $currentParent);
          $currentParent = $currentParent->parent;
        }

        // Bangun URL berdasarkan slug dari semua parent
        foreach ($parentHierarchy as $p) {
          $urlParts[] = $p->slug;
        }
      }

      // Tambahkan slug dari menu yang sedang dibuat ke dalam URL
      $urlParts[] = $validated['slug'];
      $validated['url'] = count($urlParts) > 0 ? '/' . implode('/', $urlParts) : '#';

      // Set urutan (order) untuk menu baru
      if (isset($validated['parent_id'])) {
        $parent = Menu::find($validated['parent_id']);
        $validated['order'] = $parent->children->count() + 1;
      } else {
        $validated['order'] = Menu::whereNull('parent_id')->count() + 1;
      }

      $validated['is_active'] = true;
      Menu::create($validated);

      return redirect()->route('menus.index')->with('success', 'Menu berhasil dibuat');
    } catch (Exception $e) {
      return back()->with('error', 'Menu gagal dibuat, periksa kembali inputan anda');
    }
  }

  public function update(Request $request, string $id)
  {
    try {
      $validated = $request->validate([
        'name' => 'required|string',
        'title' => 'required|string',
        'order' => 'required|integer',
        'is_active' => 'nullable',
        'parent_id' => 'nullable|exists:menus,id',
        'content_type' => 'nullable|string',
      ]);

      // Generate slug dari name
      $validated['slug'] = Str::slug($validated['name']);

      // Update is_active berdasarkan input
      $validated['is_active'] = $request->has('is_active') ? true : false;

      // Temukan menu yang akan di-update
      $menu = Menu::find($id);
      if (!$menu) {
        return back()->with('error', 'Menu not found');
      }

      // Proses URL berdasarkan hierarki parent jika ada perubahan pada parent_id
      $urlParts = [];
      if ($validated['parent_id'] !== null) {
        $parent = Menu::find($validated['parent_id']);

        // Update URL parent menjadi '#' karena sekarang memiliki child
        $parent->update(['url' => '#']);

        // Kumpulkan semua parent dari hierarki teratas ke bawah
        $parentHierarchy = [];
        $currentParent = $parent;
        while ($currentParent) {
          array_unshift($parentHierarchy, $currentParent);
          $currentParent = $currentParent->parent;
        }

        // Bangun URL berdasarkan slug dari semua parent
        foreach ($parentHierarchy as $p) {
          $urlParts[] = $p->slug;
        }
      }

      // Tambahkan slug dari menu yang sedang di-update ke dalam URL
      $urlParts[] = $validated['slug'];
      $validated['url'] = count($urlParts) > 0 ? '/' . implode('/', $urlParts) : '#';

      // Update urutan (order) jika berubah
      if ($validated['order'] !== $menu->order || $validated['parent_id'] !== $menu->parent_id) {
        $parentId = $validated['parent_id'] ?? null;

        // Pastikan order tidak bertambah otomatis
        $menuWithNewOrder = Menu::where('parent_id', $parentId)
          ->where('order', $validated['order'])
          ->first();

        if ($menuWithNewOrder) {
          $menuWithNewOrder->update(['order' => $menu->order]);
        }
      } else {
        // Jika tidak ada perubahan pada order atau parent, gunakan order saat ini
        $validated['order'] = $menu->order;
      }

      // Update data menu
      $menu->update($validated);

      return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
    } catch (Exception $e) {
      return back()->with('error', 'Menu gagal diperbarui, periksa kembali inputan anda');
    }
  }


  public function destroy(string $id)
  {
    try {
      $menu = Menu::find($id);

      if ($menu) {
        if ($menu->parent_id === null) {
          $this->deleteChildren($menu);
        }
        $menu->delete();
      }

      return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    } catch (Exception $e) {
      return back()->with('error', 'Menu gagal dihapus, pastikan tidak ada data terkait');
    }
  }

  private function deleteChildren($menu)
  {
    foreach ($menu->children as $child) {
      $this->deleteChildren($child);
      $child->delete();
    }
  }

  public function dinamicView($any, Request $request)
  {
    $slugs = explode('/', $any);

    $currentMenu = null;
    $parentId = null;

    // Untuk setiap slug, cari menu yang sesuai dengan mempertimbangkan hierarki
    foreach ($slugs as $slug) {
      $menu = Menu::where('slug', $slug)
        ->when($parentId, function ($query) use ($parentId) {
          return $query->where('parent_id', $parentId);
        })
        ->first();

      if (!$menu) {
        abort(404);
      }

      $currentMenu = $menu;
      $parentId = $menu->id;
    }

    // Setelah mendapatkan menu yang benar, proses konten
    $subjects = Subject::with('indicators')->get();
    $indicatorId = $request->get('indicator_id');
    $search = $request->get('search');
    if ($currentMenu->content_type === 'infographic') {
      $query = Infographic::where('menu_id', $currentMenu->id)
        ->whereHas('indicators')
        ->where('status', 'approved');

      if ($search) {
        $query->where('title', 'like', '%' . $search . '%');
      }

      if ($indicatorId) {
        $query->whereHas('indicators', function ($q) use ($indicatorId) {
          $q->where('indicators.id', $indicatorId);
        });
      }

      $infographics = $query->paginate(8);
      $view = 'landing.infographics';

      return view($view, [
        'currentMenu' => $currentMenu,
        'subjects' => $subjects,
        'infographics' => $infographics,
      ]);
    }

    if ($currentMenu->content_type === 'policy brief') {
      $query = Document::where('menu_id', $currentMenu->id)
        ->whereHas('indicators')
        ->where('status', 'approved');


      if ($search) {
        $query->where('title', 'like', '%' . $search . '%');
      }
      if ($indicatorId) {
        $query->whereHas('indicators', function ($q) use ($indicatorId) {
          $q->where('indicators.id', $indicatorId);
        });
      }

      $policyBriefs = $query->paginate(8);
      $view = 'landing.policy_briefs';

      return view($view, [
        'currentMenu' => $currentMenu,
        'subjects' => $subjects,
        'policyBriefs' => $policyBriefs,
      ]);
    }

    if ($currentMenu->content_type === 'document') {
      $documents = Document::where('menu_id', $currentMenu->id)->where('status', 'approved')->get();
      $view = 'landing.documents';

      return view($view, [
        'currentMenu' => $currentMenu,
        'documents' => $documents,
      ]);
    }

    if ($currentMenu->content_type === 'video') {
      $videos = Video::where('menu_id', $currentMenu->id)->where('status', 'approved')->get();
      foreach ($videos as $video) {
        if ($video->link_path) {
          $embed = OEmbed::get($video->link_path);
          if ($embed) {
            $video->embed_html = $embed->html([
              'width' => 200,
              'height' => 200
            ]);
          } else {
            $video->embed_html = null;
          }
        }
      }
      $view = 'landing.videos';
      return view($view, [
        'currentMenu' => $currentMenu,
        'videos' => $videos,
      ]);
    }

    if ($currentMenu->content_type === 'photo') {
      $photos = Photo::where('menu_id', $currentMenu->id)->where('status', 'approved')->get();
      $view = 'landing.fotos';
      return view($view, [
        'currentMenu' => $currentMenu,
        'photos' => $photos,
      ]);
    }

    if ($currentMenu->content_type === 'khusus' && $currentMenu->slug === 'hubungi-kami') {
      $view = 'landing.contact';
      $feedbacks = Feedback::where('is_approved', true)->get();
      return view($view, [
        'currentMenu' => $currentMenu,
        'feedbacks' => $feedbacks,
      ]);
    }

    if ($currentMenu->content_type === 'khusus' && $currentMenu->slug === 'berita') {
      $articleId = $request->get('id');
      if ($articleId) {
        $view = 'landing.read_news';
        $article = Article::find($articleId);
        return view($view, [
          'currentMenu' => $currentMenu,
          'news' => $article,
        ]);
      }

      $view = 'landing.news';
      $subjectsWithArticles = Subject::with('articles')->get()->map(function ($subject) {
        $subject->articles = $subject->articles->filter(fn($article) => $article->status === 'approved');
        return $subject;
      });
      $breaking = Article::where('status', 'approved')->orderByDesc('created_at')->limit(5)->get();
      return view($view, [
        'currentMenu' => $currentMenu,
        'subjects' => $subjectsWithArticles,
        'breaking' => $breaking
      ]);
    }

    abort(404);
  }
}
