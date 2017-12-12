<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    @if(\Auth::check())
        <div class="sidebar-module">
            <a href="/post/create" class="btn btn-success">Create new post</a>
        </div>
    @endif

    <div class="sidebar-module sidebar-module-inset">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            @foreach( $posts_archive as $post )
                <li>
                    <a href="/posts/{{$post->year}}/{{$post->month}}">{{$post->month_name}} {{$post->year}}
                        <span class="badge badge-primary badge-pill">{{$post->post_count}}</span>
                    </a>
                </li>
            @endforeach
        </ol>
        <hr>
        <a href="/posts">All posts <span class="badge badge-primary badge-pill">{{\App\Post::all()->count()}}</span></a>
    </div>
</aside><!-- /.blog-sidebar -->