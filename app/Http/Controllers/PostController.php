<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Posts;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signUp']]);
    }

    public function createPost(Request $request){
        $input = $request['post'];
        $post = new Posts();
        $post->content = $input['content'];
        $post->user_id=auth()->user()->id;
        $post->save();
        $post->load('user');
        return response()->json($post);
    }

    public function getPost(){
        $posts = Posts::with('user')->latest()->get();
        return response()->json($posts);
    }

    public function removePost($postId){
        Posts::where('id', $postId)->delete();
        return response()->json(['status'=>200, 'msg'=>'Deleted']);
    }
}
