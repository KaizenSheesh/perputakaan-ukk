<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'role' => 'Administrator',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Petugas',
            'role' => 'Petugas',
            'email' => 'wow@example.com',
            'password' => bcrypt('12345678'),
        ]);
        \App\Models\Category::create([
            'name' => 'History'
        ]);
        \App\Models\Category::create([
            'name' => 'Romance'
        ]);
        \App\Models\Category::create([
            'name' => 'Psychology'
        ]);
        \App\Models\Category::create([
            'name' => 'Humor & Comedy'
        ]);
        \App\Models\Category::create([
            'name' => 'Mystery, Thriller & Suspense'
        ]);
    }
}
