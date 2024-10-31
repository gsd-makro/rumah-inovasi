<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beranda = Menu::create([
            'name' => 'beranda',
            'title' => 'Beranda',
            'order' => 1,
            'slug' => 'beranda',
            'url' => '/',
        ]);

        // Data dan Dokumen
        $dataDanDokumen = Menu::create([
            'name' => 'data-dan-dokumen',
            'title' => 'Data dan Dokumen',
            'order' => 2,
            'slug' => 'data-dan-dokumen',
            'url' => '/data-dan-dokumen',
        ]);

        // Submenu Pendidikan
        $pendidikan = Menu::create([
            'name' => 'pendidikan',
            'title' => 'Pendidikan',
            'order' => 1,
            'slug' => 'pendidikan',
            'url' => '/data-dan-dokumen/pendidikan',
            'parent_id' => $dataDanDokumen->id,
        ]);

        // Submenu Kesehatan
        $kesehatan = Menu::create([
            'name' => 'kesehatan',
            'title' => 'Kesehatan',
            'order' => 2,
            'slug' => 'kesehatan',
            'url' => '/data-dan-dokumen/kesehatan',
            'parent_id' => $dataDanDokumen->id,
        ]);

        // Submenu Pendidikan - Submenu Level 2
        Menu::create([
            'name' => 'pendidikan-sub1',
            'title' => 'Pendidikan Submenu 1',
            'slug' => 'pendidikan-sub1',
            'order' => 1,
            'url' => '/data-dan-dokumen/pendidikan/sub1',
            'parent_id' => $pendidikan->id,
        ]);

        Menu::create([
            'name' => 'pendidikan-sub2',
            'title' => 'Pendidikan Submenu 2',
            'slug' => 'pendidikan-sub2',
            'order' => 2,
            'url' => '/data-dan-dokumen/pendidikan/sub2',
            'parent_id' => $pendidikan->id,
        ]);

        // Submenu Kesehatan - Submenu Level 2
        Menu::create([
            'name' => 'kesehatan-sub1',
            'title' => 'Kesehatan Submenu 1',
            'order' => 1,
            'slug' => 'kesehatan-sub1',
            'url' => '/data-dan-dokumen/kesehatan/sub1',
            'parent_id' => $kesehatan->id,
        ]);

        Menu::create([
            'name' => 'kesehatan-sub2',
            'title' => 'Kesehatan Submenu 2',
            'slug' => 'kesehatan-sub2',
            'order' => 2,
            'url' => '/data-dan-dokumen/kesehatan/sub2',
            'parent_id' => $kesehatan->id,
        ]);

        // Infografis
        Menu::create([
            'name' => 'infografis',
            'title' => 'Infografis',
            'order' => 3,
            'slug' => 'infografis',
            'url' => '/infografis',
        ]);
    }
}
