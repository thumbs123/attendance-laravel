<?php

namespace App\Models;

class Post 
{
    static $blog_posts = [
        "title" => "Judul Pertama",
        "slug" => "judul-pertama",
        "body" =>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam maiores debitis architecto accusamus? Qui nulla maxime exercitationem illum, iure commodi? A porro corrupti quaerat veniam distinctio tempora molestiae quae quo aperiam sit. Assumenda animi pariatur impedit quis est! Ex, maiores!"
    ];

    public static function all(){
        return collect(self::$blog_posts);   
    }

    public static function find($slug){
      $posts = static::all();
      return $posts->firstwhere('slug',$slug) ;
    }
}
