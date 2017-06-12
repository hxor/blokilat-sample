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
        $posts = Post::orderBy('date', 'desc')->paginate(3);
        return $posts;
    }

    /**
     * Get Post by Category
     */
    public function getPostByCategory($idcategory){
        $post_category = Category::findOrFail($idcategory)->posts()->orderBy('date', 'desc')->paginate(3);
        return $post_category;
    }

    /**
     * Get Post by User
     */
     public function getPostByUser($iduser){
        $post_user = User::findOrFail($iduser)->posts()->orderBy('date', 'desc')->paginate(3);
        return $post_user;
     }

     /**
      * Get Post detail
      */
     public function getPost($id){
        $post = Post::findOrFail($id);
        return $post;
     }
}
