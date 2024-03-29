<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Friend;
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

        
        User::create([
            'name' => 'Thumberly Raja Siagian',
            'email' => 'thumberlys@gmail.com',
            'password' => bcrypt('password')
        ]);

        Friend::create([
            'name' => 'Jojas',
            'nomor' => '93429647264',
            'sosial' => '@jowjow',
        ]);
}
}