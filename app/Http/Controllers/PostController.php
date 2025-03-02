<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::take(5)->get();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                ->withErrors($validator)
                ->withInput();
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => auth()->id(), // Get the currently authenticated user's ID
        ]);

        return redirect("/home");
    }

    public function show(Post $post)
    {
        return view('post.single', compact('post'));
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($postId);

        // Store the comment
        $post->comments()->create([
            'content' => $request->comment,
            'user_id' => auth()->id(), // Assuming the user is authenticated
        ]);

        return redirect()->route('home'); // Redirect back to the home or post page
    }
}
