{{-- Add comment --}}
<div class="row add_comment_to_{{$type}}">
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="POST" action="/comment/{{$type}}/{{ $id }}">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="text" class="form-control" class="input_comment_text" placeholder="Your comment here"></textarea>
          </div>
          <button type="submit" class="btn btn-primary {{ ($type == 'comment') ? 'btn-sm' : '' }}">Add comment</button>
          @if($type == 'comment')
            <button type="button" class="btn btn-default btn-sm">Close</button>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
