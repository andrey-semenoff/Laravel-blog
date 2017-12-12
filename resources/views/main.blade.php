@extends('index')

@section('title', 'Laravel Blog')

@section('content')
<div class="col-sm-8 blog-main">
    @if( $posts->count() > 0 )
        @foreach( $posts as $post )
            <div class="blog-post card">
                <div class="card-body">
                    <a href="/post/{{$post['id']}}" class="blog-post-title">{{$post['title']}}</a>
                    <p class="blog-post-meta">{{date('d-m-Y (H:i:s)', $post['updated_at']->getTimestamp())}} by <span>{{\App\User::find(['id' => $post['user_id']])[0]->name}}</span></p>
                    <div class="blog-post__body">
                        {{mb_substr($post['body'], 0, 255)}}
                        @if(mb_strlen($post['body']) > 255)
                            ...
                        @endif
                        <div class="text-right">
                            <a href="/post/{{$post['id']}}">Читать подробнее</a>
                        </div>
                    </div>
                </div>
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