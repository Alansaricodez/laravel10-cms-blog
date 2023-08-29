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
            'name_en' => 'laravel',
            'name_ar' => 'لارافيل',
            'slug' => 'laravel',
        ]);
        Category::create([
            'name_en' => 'php',
            'name_ar' => 'php',
            'slug' => 'php',
        ]);
        Category::create([
            'name_en' => 'javascript',
            'name_ar' => 'جافاسكربيت',
            'slug' => 'javascript',
        ]);
    }
}
