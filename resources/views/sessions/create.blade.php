@extends ('layouts.master')

@section ('content')
<div class="col-md-8">
	<h1>Sign in</h1>
	<form method="POST" action="/login">
	  {{ csrf_field() }}
	  <div class="form-group">
	    <label for="userInput">Username</label>
	    <input type="text" class="form-control" id="usernameInput" name="username" aria-describedby="usernameHelp" placeholder="Username" required/>
	  </div>
	  <div class="form-group">
	    <label for="passwordInput">Password</label>
	    <input type="password" class="form-control" id="passwordInput" name="password" aria-describedby="passwordHelp" placeholder="My secret password" required/>
	  </div>
	  <div class="form-group">
	    <button type="submit" class="btn btn-primary">Login</button>
	  </div>


	  @include ('layouts.errors')
	</form>
</div>
@endsection