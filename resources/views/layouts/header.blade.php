<header>
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link active" href="/">Home</a>
                <a class="nav-link" href="/posts">Posts</a>
                @if( \Auth::check() )
                    <div class="nav-link" style="margin-left: auto;">
                        <span>Hi, {{Auth::user()->name}}!</span>
                        <a href="/logout" style="color: #fff; font-size: 12px;">Log out</a>
                    </div>
                @else
                    <div class="nav-link" style="margin-left: auto;">
                        <a href="#" data-toggle="modal" data-target="#register-modal" style="color: #fff;">Registration</a>
                        <span> / </span>
                        <a href="#" data-toggle="modal" data-target="#login-modal" style="color: #fff;">Log in</a>
                    </div>
                @endif

                @if( session()->get('open_auth_form') !== null )
                    <script>
                        $(function () {
                            $('#login-modal').modal('show');
                        });
                    </script>
                @endif

            </nav>
        </div>
    </div>

    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">The Laravel blog</h1>
            <p class="lead blog-description">Very interesting posts</p>
        </div>
    </div>
</header>