@extends('index')

@section('title', 'Add new post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">Add new post <small><a href="/posts">Back to posts list</a></small></h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="/post/add">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="input_post_title">Post title</label>
                                <input type="text" name="title" id="input_post_title" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="input_post_body">Post content</label>
                                <textarea name="body" class="form-control" rows="10" id="input_post_body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Add post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection