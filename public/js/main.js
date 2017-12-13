$(function () {
  
  // Register user
  $(document).on('submit', '#register-form', function (e) {
    e.preventDefault();
    
    var $this = $(this),
        data = $this.serialize(),
        $alert = $('.alert').clone();

    $this.find('.btn').disable();
    
    $.ajax({
      type: "POST",
      url: "/register",
      data: data,
      dataType: 'json',
      cache: false,
      success: function (data) {
        console.log(data);

        if( data.status ) {
          $alert.addClass('alert-success alert-fixed').removeClass('fade');
        } else {
          $alert.addClass('alert-danger alert-fixed').removeClass('fade');
        }
        $alert.html(data.msg);
        $this.append($alert);

        setTimeout(function () {
          $alert.remove();
          location.reload();
        }, 3000);
      }
    });
  });

  // Login user
  $(document).on('submit', '#login-form', function (e) {
    e.preventDefault();

    var $this = $(this),
        data = $this.serialize(),
        $alert = $('.alert').clone();

    $this.find('.btn').attr('disabled', true);

    $.ajax({
      type: "POST",
      url: "/auth",
      data: data,
      dataType: 'json',
      cache: false,
      success: function (data) {
        console.log(data);

        if( data.status ) {
          $alert.addClass('alert-success alert-fixed').removeClass('fade');
          setTimeout(function () {
            $alert.remove();
            location.reload();
          }, 3000);
        } else {
          $alert.addClass('alert-danger alert-fixed').removeClass('fade');
          setTimeout(function () {
            $alert.remove();
            $this.find('.btn').attr('disabled', false);
          }, 3000);
        }
        $alert.html(data.msg);
        $this.append($alert);

      }
    });
  });

  // Open|close edit comment form
  $(document).on('click', '.comment__btn_edit-form, .comment-edit button[type="button"]', function (e) {
    e.preventDefault();

    var $this = $(this),
        $comment_inner = $this.closest('.comment-inner');

      $comment_inner.find('.comment-edit').slideToggle();
  });

  // open|hide comment replay form
  $(document).on('click', '.comment__btn_replay-form, .add_comment_to_comment button[type="button"]', function (e) {
    e.preventDefault();

    var $this = $(this),
        $comment_inner = $this.closest('.comment-inner');

      $comment_inner.children('.comment__text').children('.add_comment_to_comment').slideToggle();
  });

  //Open|hide replays to comment
  $(document).on('click', '.comment__replays-title', function (e) {
    e.preventDefault();

    var $this = $(this),
        $comment__replays = $this.siblings('.comment__replays-list');

    $this.find('svg').toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
    $comment__replays.slideToggle();
  });


  
  
});