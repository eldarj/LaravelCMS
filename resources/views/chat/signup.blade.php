@extends ('layouts.master')

@section ('content')
<h1>Join chat</h1>
<p class="lead">Would you like to join our chat? Fill out this short form and start typing in no time!</p>
<hr>
<form method="POST" action="/chat/signup">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="nameInput">Name</label>
    <input type="text" class="form-control" id="nameInput" name="name" aria-describedby="titleHelp" placeholder="Name">
    <small id="titleHelp" class="form-text text-muted">Your alias that will appear on chat</small>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-primary">Add</button>
  </div>
  @include ('layouts.errors')
</form>

@endsection