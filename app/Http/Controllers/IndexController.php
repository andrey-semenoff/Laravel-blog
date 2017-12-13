<?php

namespace App\Http\Controllers;

use App\Post;

class IndexController extends Controller
{
    //
  /**
   * @param array $middleware
   */
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();

    return view('main', compact('posts'));
  }
}
