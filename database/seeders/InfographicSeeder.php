<?php

namespace Database\Seeders;

use App\Models\Infographic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfographicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Infographic::create([
            'user_id' => 1,
            'title' => 'Infographic 1',
            'image' => 'https://via.placeholder.com/150',
            'total_likes' => 10,
            'total_views' => 100,
            'total_downloads' => 50,
            'status' => 'approved',
            'published_at' => now(),
        ]);

        Infographic::create([
            'user_id' => 1,
            'title' => 'Infographic 2',
            'image' => 'https://via.placeholder.com/150',
            'total_likes' => 20,
            'total_views' => 200,
            'total_downloads' => 100,
            'status' => 'pending',
            'published_at' => now(),
        ]);

        Infographic::create([
            'user_id' => 1,
            'title' => 'Infographic 3',
            'image' => 'https://via.placeholder.com/150',
            'total_likes' => 15,
            'total_views' => 150,
            'total_downloads' => 75,
            'status' => 'rejected',
            'published_at' => now(),
        ]);

        Infographic::create([
            'user_id' => 1,
            'title' => 'Infographic 4',
            'image' => 'https://via.placeholder.com/150',
            'total_likes' => 5,
            'total_views' => 50,
            'total_downloads' => 25,
            'status' => 'approved',
            'published_at' => now(),
        ]);

        Infographic::create([
            'user_id' => 1,
            'title' => 'Infographic 5',
            'image' => 'https://via.placeholder.com/150',
            'total_likes' => 30,
            'total_views' => 300,
            'total_downloads' => 150,
            'status' => 'pending',
            'published_at' => now(),
        ]);
    }
}
