<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => 'home'
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'title' => 'about',
        'name' => 'Thumberly Raja Siagian',
        'active' => 'categories',
        'email' => 'thumberlys@gmail.com',
        'image' => '/img/thum.jpg',
    ]);
});
Route::get('/posts', [PostController::class,'index']);

//halaman single post
Route::get('/posts/{post:slug}',[PostController::class,'show']);

Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view ('posts',[
        'title' => "Post By Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category','author'),
    ]);
});
Route::get('/authors/{author:username}', function(User $author){
    return view ('posts',[
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category','author')
    ]);
});

Route::get('/login', [LoginController::class,'index']);

Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);