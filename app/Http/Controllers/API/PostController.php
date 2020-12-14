<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['users'])->paginate(10);

        return PostResource::collection($posts);
    }

    public function store(Request $request)
    {
        $url_services = 'https://jsonplaceholder.typicode.com/posts';

        $result = file_get_contents($url_services);

        $data = json_decode($result, true);

       foreach($data as $res)
       {
            Post::create([
                'user_id' => $res['userId'],
                'title' => $res['title'],
                'body' => $res['body']
            ]);
       }

       return response()->json(['status' => 'ready']);

    }
}
