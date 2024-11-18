<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Indicator;
use App\Models\Infographic;
use App\Models\Photo;
use App\Models\Subject;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'superadmin') {
            $dataCounts = Cache::remember('super_admin_data_count', now()->addMinute(30), function () {
                return [
                    'infografis' => Infographic::count(),
                    'foto' => Photo::count(),
                    'video' => Video::count(),
                    'dokumen' => Document::whereDoesntHave('indicators')->count(),
                    'policy_brief' => Document::whereHas('indicators')->count(),
                    'berita' => Article::count(),
                    'user_aktif' => User::where('role', 'admin')->count(),
                    'subjek' => Subject::count(),
                    'indikator' => Indicator::count(),
                    'feedback' => Feedback::count(),
                ];
            });

            $top_admin = Cache::remember('top_admin', now()->addMinute(30), function () {
                return User::where('role', 'admin')
                    ->withCount([
                        'infographic',
                        'photo',
                        'video',
                        'document',
                    ])
                    ->get()
                    ->sortByDesc(function ($user) {
                        return $user->infographics_count
                            + $user->photos_count
                            + $user->videos_count
                            + $user->documents_count;
                    })
                    ->take(3)
                    ->pluck('name');
            });
            return view(
                'dashboard.superadmin_home',
                ['dataCounts' => $dataCounts, 'top_admin' => $top_admin]
            );
        } else {
            $dataCounts = Cache::remember('admin_data_count_' . Auth::id(), now()->addMinute(30), function () {
                return [
                    'infografis' => Infographic::where('user_id', Auth::id())->count(),
                    'foto' => Photo::where('user_id', Auth::id())->count(),
                    'video' => Video::where('user_id', Auth::id())->count(),
                    'dokumen' => Document::where('user_id', Auth::id())->whereDoesntHave('indicators')->count(),
                    'policy_brief' => Document::where('user_id', Auth::id())->whereHas('indicators')->count(),
                    'berita' => Article::where('user_id', Auth::id())->count(),
                ];
            });
            return view('dashboard.admin_home', ['dataCounts' => $dataCounts]);
        }
    }
}
