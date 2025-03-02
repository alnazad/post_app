<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        // Eager load the 'postable' and 'user' relationships
    $posts = Post::with('user')->take(5)->get();

    return view('home', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('post.single', compact('post'));
    }
}
