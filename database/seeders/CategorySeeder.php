<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultCategories = [
            'Olahraga',
            'Belajar',
            'Bekerja',
            'Jogging',
            'Membaca',
        ];

        foreach ($defaultCategories as $category) {
            Category::create([
                'name' => $category,
                'is_default' => true,
                'user_id' => null,
            ]);
        }
    }
}
