{{-- All comments --}}
@if(!empty($comments))
  <hr>
  <ul class="comments-list">
    @foreach( $comments as $comment )
      <li class="row comment">
        <div class="col-2">
          <div class="comment-photo-holder">
            <img src="/img/ava_default.png" class="comment-photo" alt="ava">
          </div>
        </div>
        <div class="col-10 comment-inner">
          <div class="comment__title">
            <span class="comment__title-name">{{ $comment['author'] }}</span>
            <span class="comment__title-date">{{ date('d-m-Y (H:i:s)', $comment['created_at']->getTimestamp()) }}</span>
          </div>
          <div class="comment__text">
            @include('comment.edit', ['id' => $comment['id'], 'text' => $comment['text']])
            @include('comment.add', ['type'=>'comment', 'id' => $comment['id']])
            {{ $comment['text'] }}
          </div>
          <div class="comment__actions">
            <a href="#" class="comment__btn comment__btn_replay-form">Ответить</a>
            @if( $comment['user_id'] == auth()->id() )
              <a href="#" class="comment__btn comment__btn_edit-form text-warning">Редактировать</a>
              <a href="/comment/{{$comment['id']}}/delete" class="comment__btn comment__btn_delete text-danger">Удалить</a>
            @endif
            <span class="comment__likes">{{$comment['likes']}}</span>
            <span class="comment__vote">
              <a href="/like/comment/{{$comment['id']}}/1" class="text-success"><span class="{{ (count($comment['vote']) && $comment['vote']['type'] == 1) ? 'fas' : 'far'  }} fa-thumbs-up"></span></a>
              <a href="/like/comment/{{$comment['id']}}/0" class="text-danger"><span class="{{ (count($comment['vote']) && $comment['vote']['type'] == 0) ? 'fas' : 'far'  }} fa-thumbs-down"></span></a>
            </span>
            <span class="comment__dislikes">{{$comment['dislikes']}}</span>
          </div>

          @if( session()->has('is_allow') && !session('is_allow'))
            <div class="text-danger">Удаление не разрешено!</div>
          @endif

          @if( !empty($subcomments_all[$comment['id']]) )
            <div class="comment__replays">
              <a href="#" class="comment__replays-title">Все ответы ({{ count($subcomments_all[$comment['id']]) }}) <span class="fa fa-chevron-down"></span></a>
              <ul class="comment__replays-list">
                @foreach($subcomments_all[$comment['id']] as $subcomment)
                  <li class="row comment__replays-item">
                    <div class="col-2">
                      <div class="comment-photo-holder">
                        <img src="/img/ava_default.png" class="comment-photo" alt="ava">
                      </div>
                    </div>
                    <div class="col-10 comment-inner">
                      <div class="comment__title">
                        <span class="comment__title-name">{{ $subcomment['author'] }}</span>
                        <span class="comment__title-date">{{ date('d-m-Y (H:i:s)', $subcomment['created_at']->getTimestamp()) }}</span>
                      </div>
                      <div class="comment__text">
                        {{--@include('comment.edit', ['id' => $subcomment['id'], 'text' => $subcomment['text']])--}}
                        {{--@include('comment.add', ['type'=>'comment', 'id' => $subcomment['id']])--}}
                        {{ $subcomment->text }}
                      </div>

                      <div class="comment__actions">
                        @if( $subcomment['user_id'] == auth()->id() )
                          <a href="#" class="comment__btn comment__btn_edit-form text-warning">Редактировать</a>
                          <a href="/comment/{{$comment['id']}}/delete" class="comment__btn comment__btn_delete text-danger">Удалить</a>
                        @endif
                        <span class="comment__likes">{{$subcomment['likes']}}</span>
                        <span class="comment__vote">
                          <a href="/like/comment/{{$subcomment['id']}}/1" class="text-success"><span class="{{ (count($subcomment['vote']) && $subcomment['vote']['type'] == 1) ? 'fas' : 'far'  }} fa-thumbs-up"></span></a>
                          <a href="/like/comment/{{$subcomment['id']}}/0" class="text-danger"><span class="{{ (count($subcomment['vote']) && $subcomment['vote']['type'] == 0) ? 'fas' : 'far'  }} fa-thumbs-down"></span></a>
                        </span>
                        <span class="comment__dislikes">{{$subcomment['dislikes']}}</span>
                      </div>

                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      </li>
    @endforeach
  </ul>
@endif
