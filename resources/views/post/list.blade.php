@extends('index')

@section('title', 'Posts list')

@section('content')
    <div class="col-sm-8 blog-main">
        @if( $posts->count() > 0 )
            @foreach( $posts as $i => $post )
                @if($i > 0)
                    <hr>
                @endif
                <div class="blog-post">
                    <a href="/post/{{$post->id}}" class="blog-post-title">{{$post->title}}</a>
                    <p class="blog-post-meta">{{date('d-m-Y (H:i:s)', strtotime($post->created_at))}} by {{\App\User::find(['id' => $post->user_id])[0]->name}}</p>
                </div><!-- /.blog-post -->
            @endforeach
        @else
            <p>Sorry, no posts yet!</p>
        @endif
    </div><!-- /.blog-main -->
@endsection

@section('aside')
    @include('layouts.aside')
@endsection