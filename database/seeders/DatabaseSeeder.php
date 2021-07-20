<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $filepath = public_path('storage/posts');
        File::deleteDirectory($filepath);
        File::makeDirectory($filepath);
        /*if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }*/

        //Storage::makeDirectory('posts');

         $this->call(UserSeeder::class);
         Category::factory(4)->create();
         Tag::factory(8)->create();
         $this->call(PostSeeder::class);
    }
}
