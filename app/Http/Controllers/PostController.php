<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    //get users post list
    public function getUserPosts(User $user)
    {
        $user = Auth::user();
        $posts = $user->posts;
        
        return view('post.list', compact('posts'));
    }

    // for create new post view
    public function create()
    {
        return view('post.create');
    }

    //save post data into table
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            ],
            [
                'title.max' => 'The title should not be longer than 100 characters.', 
            ]);

        $user = Auth::user();

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // return response()->json(['post' => $post], 201);
        return redirect('/posts')->with('success', 'Post created successfully.');
    }

}
