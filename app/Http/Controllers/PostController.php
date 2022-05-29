<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts', compact('posts'));
    }
    public function create(){
        $postsArr = [
            [
                'title' =>'title from phpStorm',
                'content'=>'lorem ipsum - heripsum',
                'image'=>'image4',
                'likes'=>12410,
                'is_published'=>1
            ],
            [
                'title' =>'another from phpStorm',
                'content'=>'another lorem ipsum - heripsum 2',
                'image'=>'another image5',
                'likes'=>120,
                'is_published'=>1
            ],
            [
                'title' =>'another one more from phpStorm',
                'content'=>'another lorem ipsum - heripsum3',
                'image'=>'another image6',
                'likes'=>410,
                'is_published'=>1
            ],
        ];

        foreach ($postsArr as $item){
            Post::create($item);
        }

        dd('created');
    }

    public function update(){
        $post = Post::find(4);

        $post->update(['title' =>'updated updated 2',
            'content'=>'updated  - heripsum 2',
            'image'=>'updated updated',
            'likes'=>1220,
            'is_published'=>1]);
        dd('updated');
    }
    public function delete(){
        $post = Post::find(3);
        $post->delete();
//        $post = Post::withTrashed()->find(3);
//        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate(){
        $post = Post::find(1);
        $somePost = ['title' =>'some another title phpStorm',
            'content'=>'$somePost  - heripsum 2',
            'image'=>'$somessssssPostv updated',
            'likes'=>1220,
            'is_published'=>1];
        $post = Post::firstOrCreate([
            'title'=>'s'
        ],
            $somePost
        );
       dump($post->content);
       dd('finished');
    }
}
