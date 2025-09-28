<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = ['General', 'Laravel', 'PHP', 'Databases', 'Security'];

        foreach ($names as $name) {
            Category::firstOrCreate(
                ['name' => $name],                 // unique by name
                ['slug' => Str::slug($name)]       // slugify e.g. "Databases" -> "databases"
            );
        }
    }
}
