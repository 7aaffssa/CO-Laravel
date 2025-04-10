<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {
         Log::info('Starting PostSeeder...');
     
         \App\Models\Post::create([
             'title' => '1 post',
             'body' => 'Ceci est le contenu de mon premier post.',
             'author' => '1'
         ]);
         \App\Models\Post::create([
             'title' => '2 post',
             'body' => 'Ceci est le contenu de mon premier post.',
             'author' => '2'
         ]);
         \App\Models\Post::create([
             'title' => '3 post',
             'body' => 'Ceci est le contenu de mon premier post.',
             'author' => '3'
         ]);
         \App\Models\Post::create([
             'title' => '4 post',
             'body' => 'Ceci est le contenu de mon premier post.',
             'author' => '4'
         ]);
         \App\Models\Post::create([
             'title' => '5 post',
             'body' => 'Ceci est le contenu de mon premier post.',
             'author' => '5'
         ]);
     
         Log::info('PostSeeder completed successfully.');
     }
}