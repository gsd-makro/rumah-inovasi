<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert(
            [
                [
                    'parent_id' => null,
                    'slug' => 'beranda',
                    'name' => 'Beranda',
                    'title' => 'Beranda',
                    'order' => 1,
                    'url' => '/',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'khusus'
                ],
                [
                    'parent_id' => null,
                    'slug' => 'profil',
                    'name' => 'Profil',
                    'title' => 'Profil',
                    'order' => 2,
                    'url' => '#',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => null
                ],
                [
                    'parent_id' => 2,
                    'slug' => 'tentang-rinov-go',
                    'name' => 'Tentang Rinov Go',
                    'title' => 'Tentang Rinov Go',
                    'order' => 1,
                    'url' => '/profil/tentang-rinov-go',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'khusus'
                ],
                [
                    'parent_id' => null,
                    'slug' => 'inovasi-dan-policy-brief',
                    'name' => 'Inovasi dan Policy Brief',
                    'title' => 'Inovasi dan Policy Brief',
                    'order' => 3,
                    'url' => '#',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => null
                ],
                [
                    'parent_id' => 4,
                    'slug' => 'infografis-inovasi',
                    'name' => 'Infografis Inovasi',
                    'title' => 'Infografis Inovasi',
                    'order' => 1,
                    'url' => '/inovasi-dan-policy-brief/infografis-inovasi',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'infographic'
                ],
                [
                    'parent_id' => 4,
                    'slug' => 'policy-brief',
                    'name' => 'Policy Brief',
                    'title' => 'Policy Brief',
                    'order' => 2,
                    'url' => '/inovasi-dan-policy-brief/policy-brief',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'policy brief'
                ],
                [
                    'parent_id' => null,
                    'slug' => 'produk-hukum',
                    'name' => 'Produk Hukum',
                    'title' => 'Produk Hukum',
                    'order' => 4,
                    'url' => '#',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => null
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'undang-undang',
                    'name' => 'Undang-Undang',
                    'title' => 'Undang-Undang',
                    'order' => 1,
                    'url' => '/produk-hukum/undang-undang',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'peraturan-pemerintah',
                    'name' => 'Peraturan Pemerintah',
                    'title' => 'Peraturan Pemerintah',
                    'order' => 2,
                    'url' => '/produk-hukum/peraturan-pemerintah',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'peraturan-menteri',
                    'name' => 'Peraturan Menteri',
                    'title' => 'Peraturan Menteri',
                    'order' => 3,
                    'url' => '/produk-hukum/peraturan-menteri',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'peraturan-daerah',
                    'name' => 'Peraturan Daerah',
                    'title' => 'Peraturan Daerah',
                    'order' => 4,
                    'url' => '/produk-hukum/peraturan-daerah',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'peraturan-gubernur',
                    'name' => 'peraturan Gubernur',
                    'title' => 'peraturan Gubernur',
                    'order' => 5,
                    'url' => '/produk-hukum/peraturan-gubernur',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => 7,
                    'slug' => 'surat-keputusan',
                    'name' => 'Surat Keputusan',
                    'title' => 'Surat Keputusan',
                    'order' => 6,
                    'url' => '/produk-hukum/surat-keputusan',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'document'
                ],
                [
                    'parent_id' => null,
                    'slug' => 'hubungi-kami',
                    'name' => 'Hubungi Kami',
                    'title' => 'Hubungi Kami',
                    'order' => 5,
                    'url' => '/hubungi-kami',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'khusus'
                ],
                [
                    'parent_id' => null,
                    'slug' => 'berita',
                    'name' => 'Berita',
                    'title' => 'Berita',
                    'order' => 6,
                    'url' => '#',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => null
                ],
                [
                    'parent_id' => 15,
                    'slug' => 'berita',
                    'name' => 'Berita',
                    'title' => 'Berita',
                    'order' => 1,
                    'url' => '/berita/berita',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'khusus'
                ],
                [
                    'parent_id' => 15,
                    'slug' => 'galeri',
                    'name' => 'Galeri',
                    'title' => 'Galeri',
                    'order' => 2,
                    'url' => '/berita/galeri',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'photo'
                ],
                [
                    'parent_id' => 15,
                    'slug' => 'video',
                    'name' => 'video',
                    'title' => 'video',
                    'order' => 3,
                    'url' => '/berita/video',
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'content_type' => 'video'
                ],
            ]
        );
    }
}
