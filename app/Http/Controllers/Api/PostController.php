<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    //
    public function create(CreatePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->website_list_id = $request->website_list_id;
        $post->save();
        return response()->json(['title'=>$post->title, 'description'=>$post->description,'message'=>'Post created successfully']);
    }
}
