<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title'=>"IT"]);
        Category::create(['title'=>"Information Technology"]);
        Category::create(['title'=>"Computer"]);
        Category::create(['title'=>"Computer Science"]);
        Category::create(['title'=>"Mechanical Engineering"]);
        Category::create(['title'=>"News"]);
        Category::create(['title'=>"Public"]);
    }
}
