<div class="bg-white box-shadow d-flex">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="/">Dashboard</a>
    @if(auth()->user() && auth()->user()->chatUser)
    <a class="nav-link" href="/friends">
      Friends
      <span class="badge badge-pill bg-light align-text-bottom">{{auth()->user()->chatUser->friends->count()}}</span>
    </a>
    <div class="dropdown friend-requests-nav">
      <a class="nav-link" 
         href="/" 
         id="dropdownMenu2" 
         data-toggle="dropdown"
         data-ajax-request data-ajax-target="friends-requests" data-ajax-action="{{ route('friends.requests') }}" data-ajax-method="get">
        <i class="fas fa-user-friends"></i>
        <span class="badge badge-pill bg-light align-text-bottom">{{auth()->user()->chatUser->friend_requests->where('confirmed', 0)->count()}}</span>
      </a>
      <div id="dontCloseDropdown" class="dropdown-menu list-of-friend-requests">
        <div id="friends-requests" class="d-flex flex-column">
          <span class="mx-4 text-center text-secondary">...</span>
        </div>
      </div>
    </div>
    @endif
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
      <a class="nav-link" href="/chat">Chat <i class="far fa-comments"></i></a>
      <a class="nav-link" href="/chat/signup">Welcome <span class="text-info">{{ Auth::user()->name }}</span>!</a>
      <a class="nav-link" href="/logout">Logout</a>
    @endif
  </nav>
</div>