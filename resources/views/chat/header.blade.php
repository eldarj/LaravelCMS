<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Profile</h1>
    <p class="lead text-muted">Edit and see how others see your profile.</p>
    <p>
      <a href="{{ route('profile', ['chatUser' => auth()->user()->chatUser]) }}" class="btn btn-primary my-2">My profile</a>
    </p>
  </div>
</section>