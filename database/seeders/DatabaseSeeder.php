<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//
        User::truncate();
        Post::truncate();
        Category::truncate();

         $user = User::factory(1)->create();

         $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'personal',
         ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family ->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-first-post',
//            'excerpt' => 'loerm ipsum',
//            'body' => 'lorem ipsm dolor sit anet,'
//        ]);


//        Post::create([
//            'user_id' => $user ->id,
//            'category_id' => $work ->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'loerm ipsum',
//            'body' => 'lorem ipsm dolor sit anet,'
//        ]);
    }
}
