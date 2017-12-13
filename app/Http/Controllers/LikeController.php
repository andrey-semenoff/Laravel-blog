<?php

namespace App\Http\Controllers;

use App\Like;

class LikeController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($likable_type, $likable_id, $type)
    {

      $like = Like::where([
          ['user_id', auth()->id()],
          ['likable_id', $likable_id],
          ['likable_type', 'App\\'. ucfirst($likable_type)],
      ])->first();


      if( !$like ) {
        Like::create([
            'user_id' => auth()->id(),
            'type' => $type,
            'likable_id' => $likable_id,
            'likable_type' => 'App\\'. ucfirst($likable_type)
        ]);
      } else {
        if( $like->type == $type ) {
          $like->delete();
        } else {
          $like->type = $type;
          $like->save();
        }
      }

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
      $like->delete();
      return redirect()->back();
    }
}
