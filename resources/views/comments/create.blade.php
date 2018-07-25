<form method="POST" action="/articles/{{ $article->id }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="commentInput">Leave a comment</label>
    <textarea class="form-control form-control-sm" id="commentInput" name="body" aria-describedby="bodyHelp" placeholder="Enter comment text" required></textarea>
    <small id="bodyHelp" class="form-text text-muted">Comment text</small>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary">Write</button>
  </div>
  @include ('layouts.errors')
</form>