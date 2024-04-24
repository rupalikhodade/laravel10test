<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        
        $posts = Post::query();
        // auth()->user()
        if ($request->has('user_id')) {
            $posts = Post::where('user_id', $request->input('user_id'));
        }

        if ($request->has('created_at')) {
            $posts = Post::whereDate('created_at', $request->input('created_at'));
        }
        
        // Pagination
        $posts = $posts->paginate(2);
        
        $success['success']         = true;
        $success['code']            = 200;
        $success['message']         = 'Post list.';
        $success['data']['posts']   = $posts;
        
        return response()->json($success);
        
    }

}
