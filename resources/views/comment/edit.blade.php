{{-- Edit comment --}}
<div class="row comment-edit">
  <div class="col">
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="post" action="/comment/{{ $id }}">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="patch"/>
          <div class="form-group">
            <textarea name="text" class="form-control" class="input_comment_text" placeholder="Edit comment here">{{ $text }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Save comment</button>
          <button type="button" class="btn btn-default btn-sm">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
