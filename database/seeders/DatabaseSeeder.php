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
            'friend_id'=> 1,
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Endy',
            'email' => 'edi@gmail.com',
            'friend_id'=> 1,
            'password' => bcrypt('password')
        ]);
        
        Friend::create([
            'name' => 'bujes',
            'nomor' => '09868',
            'email' => 'adibaf@gmail.com',
            'sosial' => '@thumbthumbs',
            'user_id' => 1,
        ]);
}
}