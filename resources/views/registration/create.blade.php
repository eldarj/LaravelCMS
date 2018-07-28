@extends ('layouts.master')

@section ('content')

<div class="col-md-8">
	<h1>Register</h1>

	<form method="POST" action="/register">
	  {{ csrf_field() }}
	  <div class="form-group">
	    <label for="nameInput">Name</label>
	    <input type="text" class="form-control" id="nameInput" name="name" aria-describedby="nameHelp" placeholder="My name" required/>
	  </div>
	  <div class="form-group">
	    <label for="emailInput">Email</label>
	    <input type="email" class="form-control" id="emailInput" name="email" aria-describedby="emailHelp" placeholder="My email address" required/>
	  </div>
	  <div class="form-group">
	    <label for="usernameInput">Username</label>
	    <input type="text" class="form-control" id="usernameInput" name="username" aria-describedby="usernameHelp" placeholder="My Username" required/>
	  </div>
	  <div class="form-group">
	    <label for="passwordInput">Password</label>
	    <input type="password" class="form-control" id="passwordInput" name="password" aria-describedby="passwordHelp" placeholder="My secret password" required/>
	  </div>
	  <div class="form-group">
	    <label for="passwordConfirmInput">Password Confirmation</label>
	    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="passwordConfirmHelp" placeholder="Confirm your password" required/>
	  </div>
	  <div class="form-group">
	    <button type="submit" class="btn btn-primary">Register</button>
	  </div>
	  @include ('layouts.errors')
	</form>
</div>

@endsection