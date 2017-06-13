<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status','1')->orderBy('date', 'desc')->paginate(3);
        return view('pages.blog', compact('posts'));
    }

    /**
     * Get Post by Category
     */
    public function getPostByCategory($idcategory){
        $posts = Category::findOrFail($idcategory)->posts()->where('status','1')->orderBy('date', 'desc')->paginate(3);
        return view('pages.blog', compact('posts'));
    }

    /**
     * Get Post by User
     */
     public function getPostByUser($iduser){
        $posts = User::findOrFail($iduser)->posts()->where('status','1')->orderBy('date', 'desc')->paginate(3);
        return view('pages.blog', compact('posts'));
     }

     /**
      * Get Post detail
      */
     public function getPost($id){
        $post = Post::findOrFail($id);
        return view('pages.post', compact('post'));
     }
}
