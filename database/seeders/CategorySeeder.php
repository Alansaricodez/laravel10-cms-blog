<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'laravel',
            'slug' => 'laravel',
        ]);
        Category::create([
            'name' => 'php',
            'slug' => 'php',
        ]);
        Category::create([
            'name' => 'javascript',
            'slug' => 'javascript',
        ]);
    }
}
