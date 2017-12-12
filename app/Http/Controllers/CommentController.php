<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __construct()
  {
//    $this->middleware(['auth'])->except(['index', 'show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $commentable_type, $commentable_id)
    {
      $validator = Validator::make($request->all(), [
          'text' => 'required|max:255|min:3'
      ]);


      if ($validator->fails()) {
        return Response::json([
            'status' => false,
            'request' => $request,
            'validator' => $validator
        ]);
      }

      Comment::create([
          'text' => $request['text'],
          'user_id' => auth()->id(),
          'commentable_id' => $commentable_id,
          'commentable_type' => 'App\\'. ucfirst($commentable_type)
      ]);

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
      $comment['text'] = $request['text'];
      $comment->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      $is_allow = auth()->user()->can('delete', $comment);
      if ($is_allow) {
        // Выполняется метод "create" соответствующей политики...
        $comment->delete();
      }

      return redirect()->back()->with('is_allow', $is_allow);
    }
}
