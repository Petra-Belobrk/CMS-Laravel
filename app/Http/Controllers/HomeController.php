<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        return view('front.home', compact('posts', 'categories'));
    }

    public function searchResults(Request $request) {
            $search = $request->input('search');
            $categories = Category::all();

            $posts = Post::query()->where('title', 'LIKE', '%' . $search . '%' )->paginate(3);
        return view('front.home', compact( 'posts', 'categories'));


    }
}
