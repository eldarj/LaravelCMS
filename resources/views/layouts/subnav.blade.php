<div class="nav-scroller bg-white box-shadow d-flex">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="/">Dashboard</a>
    <a class="nav-link" href="/">
      Friends
      <span class="badge badge-pill bg-light align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="/">Explore</a>
    <a class="nav-link" href="/">Suggestions</a>
    <a class="nav-link" href="/tasks">Tasks</a>
    <a class="nav-link" href="/articles">Articles</a>
  </nav>
  <nav class="nav nav-underline ml-auto">
    @if(Auth::guest())
      <a class="nav-link" href="/login">Login</a>
      <a class="nav-link" href="/register">Register</a>
    @endif

    @if(Auth::check())
      <a class="nav-link" href="/profile">Welcome <span class="text-info">{{ Auth::user()->name }}</span>!</a>
      <a class="nav-link" href="/logout">Logout</a>
    @endif
  </nav>
</div>