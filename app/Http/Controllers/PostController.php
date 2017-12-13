<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year = null, $month = null)
    {
        //
      $posts = DB::table('posts');

      if( $year != null) {
        $posts = $posts->whereYear('created_at', $year);
      }

      if( $month != null ) {
        $posts = $posts->whereMonth('created_at', $month);
      }

      $posts = $posts->orderBy('created_at', 'desc')->get();

      return view('post.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('post.add', compact('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $post = new Post();
      $post->user_id = $request->user()->id;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $comments = $post->comments()->get();
      $subcomments_all = [];

      foreach($comments as $comment) {
        $comment->likes = $comment->likes()->count();
        $comment->dislikes = $comment->dislikes()->count();
        $comment->vote = $comment->vote()->first();

        $subcomments = $comment->comments()->get();

        if( count($subcomments) > 0 ) {
          foreach($subcomments as $subcomment) {
            $subcomment->likes = $subcomment->likes()->count();
            $subcomment->dislikes = $subcomment->dislikes()->count();
            $subcomment->vote = $subcomment->vote()->first();
          }
          $subcomments_all[$comment['id']] = $subcomments;
        }
      }

      return view('post.item', compact('post', 'comments', 'subcomments_all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
      return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      $post = new Post();
      $post->where('id', $id)
            ->update([
                'title' => $request->title,
                'body' => $request->body
            ]);
      return redirect('/post/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
      $post->delete();
      return redirect('/posts');
    }
}
