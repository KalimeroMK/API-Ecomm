<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Models\Category;
use Modules\Post\Models\Post;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory()->count(10)->create();
        Post::factory()
            ->count(100)
            ->hasAttached($categories)
            ->create();
    }
}
