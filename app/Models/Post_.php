<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "judul" => "Judul Satu",
            "slug" => "judul-satu",
            "author" => "Fitra Fajar",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex quisquam ratione ducimus illum, vitae eveniet, sit corporis modi aperiam beatae soluta, autem numquam architecto necessitatibus fugiat consequuntur sapiente doloribus quod nihil ab ipsam vero earum nostrum quos. Qui excepturi soluta modi nulla nam quae amet vitae distinctio, magni, earum beatae quia maxime necessitatibus est. Modi laborum hic veniam, ipsum ducimus commodi officiis, adipisci voluptates esse voluptatibus autem magni et eum saepe eligendi incidunt asperiores fugiat facere! Qui fugiat laboriosam quasi!"
        ],
        [
            "judul" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Rusamsi",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex quisquam ratione ducimus illum, vitae eveniet, sit corporis modi aperiam beatae soluta, autem numquam architecto necessitatibus fugiat consequuntur sapiente doloribus quod nihil ab ipsam vero earum nostrum quos. Qui excepturi soluta modi nulla nam quae amet vitae distinctio, magni, earum beatae quia maxime necessitatibus est. Modi laborum hic veniam, ipsum ducimus commodi officiis, adipisci voluptates esse voluptatibus autem magni et eum saepe eligendi incidunt asperiores fugiat facere! Qui fugiat laboriosam quasi!"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
