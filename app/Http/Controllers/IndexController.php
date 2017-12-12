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
    $posts = Post::get();

    return view('main', compact('posts'));
  }
}
