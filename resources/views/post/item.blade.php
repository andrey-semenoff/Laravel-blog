@extends('index')

@section('title', $post['title'])

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h4 class="blog-post-title">
                {{ $post['title'] }}
                @if(\Auth::check() && (\Auth::user()->id == $post['user_id'] || \Auth::user()->id == 1))
                    <a href="#" data-toggle="modal" data-target="#delpost-modal" class="btn btn-danger float-right">Delete post</a>
                    <a href="/post/{{ $post['id'] }}/edit" class="btn btn-warning float-right">Edit post</a>
                @endif
            </h4>
            <p class="blog-post-meta">{{date('d-m-Y (H:i:s)', $post['created_at']->getTimestamp())}} by <span>{{\App\User::find(['id' => $post['user_id']])[0]->name}}</span></p>
            {!! $post['body'] !!}

            <div class="comments">
                <hr>
                @include('comment.add', ['type'=>'post', 'id' => $post['id']])
                @include('comment.list')
            </div>
        </div><!-- /.blog-post -->
    </div>
@endsection

@section('aside')
    @include('layouts.aside')
@endsection