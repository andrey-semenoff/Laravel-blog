@extends('index')

@section('title', $post['title'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">Edit Post #{{ $post['id'] }}: "{{ $post['title'] }}"</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="/post/{{ $post['id'] }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="input_post_title">Post title</label>
                                <input type="text" name="title" id="input_post_title" class="form-control" value="{{ $post['title'] }}">
                            </div>
                            <div class="form-group">
                                <label for="input_post_body">Post content</label>
                                <textarea name="body" class="form-control" rows="10" id="input_post_body">{{ $post['body'] }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save post</button>
                            <a href="/post/{{ $post['id'] }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection