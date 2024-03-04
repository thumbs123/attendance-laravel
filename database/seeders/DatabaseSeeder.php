<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        
        // User::create([
        //     'name' => 'Thumberly Raja Siagian',
        //     'email' => 'thumberlys@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

         User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-Design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(15)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad amet alias culpa, nesciunt voluptas enim accusamus facilis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad amet alias culpa, nesciunt voluptas enim accusamus facilis quae tempore fuga labore sunt veritatis harum? Hic quas repellendus veritatis magnam distinctio labore laudantium dolorum iure voluptas minus nesciunt corrupti voluptatem, vero aliquam suscipit dolorem ipsum laborum doloribus odio quae expedita obcaecati facere inventore. Necessitatibus quaerat quam ab culpa esse, animi odio officiis tenetur itaque consequatur, aut exercitationem reiciendis, modi molestiae vel odit! Nulla aliquid dolorum et quas tempora! Excepturi asperiores debitis pariatur rem maxime aut alias nobis commodi quibusdam, sint inventore eaque delectus sit labore repellendus iusto doloribus nemo distinctio at.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad amet alias culpa, nesciunt voluptas enim accusamus facilis',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad amet alias culpa, nesciunt voluptas enim accusamus facilis quae tempore fuga labore sunt veritatis harum? Hic quas repellendus veritatis magnam distinctio labore laudantium dolorum iure voluptas minus nesciunt corrupti voluptatem, vero aliquam suscipit dolorem ipsum laborum doloribus odio quae expedita obcaecati facere inventore. Necessitatibus quaerat quam ab culpa esse, animi odio officiis tenetur itaque consequatur, aut exercitationem reiciendis, modi molestiae vel odit! Nulla aliquid dolorum et quas tempora! Excepturi asperiores debitis pariatur rem maxime aut alias nobis commodi quibusdam, sint inventore eaque delectus sit labore repellendus iusto doloribus nemo distinctio at.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}
