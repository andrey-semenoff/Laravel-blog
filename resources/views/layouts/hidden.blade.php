<div style="position: absolute;left: -9999px;">
    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="/" id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="/" id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype your password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Remove post Modal -->
    <div class="modal fade" id="delpost-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you really want to <span class="list-group-item-danger">delete</span> post?</h5>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    @if( isset($post) )
                        <a href="/post/{{ $post->id }}/del" class="btn btn-danger">Delete post</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Alert box -->
    <div class="alert alert-dismissible" role="alert"></div>

</div>