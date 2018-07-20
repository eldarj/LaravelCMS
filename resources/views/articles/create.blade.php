@extends ('layouts.master')

@section ('content')
<h1>Create a new article</h1>
<hr>
<form method="POST" action="/articles">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="titleInput">Title</label>
    <input type="text" class="form-control" id="titleInput" name="title" aria-describedby="titleHelp" placeholder="Enter article title">
    <small id="titleHelp" class="form-text text-muted">Article title</small>
  </div>
  <div class="form-group">
    <label for="bodyInput">Body</label>
    <input type="text" class="form-control" id="bodyInput" name="body" aria-describedby="bodyHelp" placeholder="Enter article text">
    <small id="bodyHelp" class="form-text text-muted">Article content text</small>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-primary">Add</button>
  </div>
  @include ('layouts.errors')
</form>

@endsection