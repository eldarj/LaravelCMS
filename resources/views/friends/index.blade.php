@extends ('layouts.master')

@section ('header')
	@include ('chat.header')
@endsection

@section ('content')

<div class="col-sm">
    <h4 class="border-bottom border-gray pb-2 mb-3">Prijatelji</h6>
    <div class="friends-container friends">
        @foreach ($friends as $key => $friend)
        <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
            <div class="friends-avatar mw-25 p-2 mr-2">
                <div class="border profile-pic friends-profile-img rounded-circle"
                     style="background-image:url('{{$friend->receiving->avatar}}');"></div>
            </div>
            <div class="details mw-75 d-flex flex-column p-2">
                <div class="d-block mw-100">
                    <div class="friend-name flex-grow">
                    <span class="text-dark">{{$friend->receiving->name}}</span>
                    </div>
                    <div class="friends-since mw-25">
                        <span class="text-secondary">{{$friend->modified_at}}</span>
                    </div>
                </div>
                <div class="d-block mw-100">
                    <a href="/profile/{{$friend->receiving->name}}" class="small">Visit profile</a>
                </div>
            </div>
        </div>
        @endforeach
        @if(!count($friends))
          <div class="dropdown-item friend-request no-requests px-2 d-flex flex-row">
            @include('friends.pronadji')
          </div>
        @endif
    </div>
</div>
<div class="d-flex flex-row">
    <div class="col-sm">
        <h4 class="border-bottom border-gray pb-2 mb-3">Vaši zahtjevi</h6>
        <div class="friends-container sent">
            @foreach ($invited as $key => $friend)
            <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
                <div class="friends-avatar mw-25 p-2 mr-2">
                    <div class="border profile-pic friends-profile-img rounded-circle"
                         style="background-image:url('{{$friend->receiving->avatar}}');"></div>
                </div>
                <div class="details mw-75 d-flex flex-column p-2">
                    <div class="d-block mw-100">
                        <div class="friend-name flex-grow">
                        <span class="text-dark">{{$friend->receiving->name}}</span>
                        </div>
                        <div class="friends-since mw-25">
                            <span class="text-secondary">{{$friend->modified_at}}</span>
                        </div>
                    </div>
                    <div class="d-block mw-100">
                        <a href="/profile/{{$friend->receiving->name}}" class="small">Posjeti profil</a>
                    </div>
                </div>
            </div>
            @endforeach
        @if(!count($invited))
          <div class="dropdown-item friend-request no-requests px-2 d-flex flex-row">
              <div class="dropdown-item friend-request no-requests px-2 d-flex flex-row">
                <div class="empty-requests small mr-5 d-flex flex-column">
                    <div class="text-secondary mx-2 ">Nemate poslanih zahtjeva na čekanju.</div>
                </div>
              </div>
          </div>
        @endif
        </div>
    </div>
    <div class="col-sm">
        <h4 class="border-bottom border-gray pb-2 mb-3">Primljeni zahtjevi</h4>
        <div class="friends-container received">
            @foreach ($received as $key => $friend)
            <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
                <div class="friends-avatar mw-25 p-2 mr-2">
                    <div class="border profile-pic friends-profile-img rounded-circle"
                         style="background-image:url('{{$friend->receiving->avatar}}');"></div>
                </div>
                <div class="details mw-75 d-flex flex-column p-2">
                    <div class="d-block mw-100">
                        <div class="friend-name flex-grow">
                        <span class="text-dark">{{$friend->receiving->name}}</span>
                        </div>
                        <div class="friends-since mw-25">
                            <span class="text-secondary">{{$friend->modified_at}}</span>
                        </div>
                    </div>
                    <div class="d-block mw-100">
                        <a href="/profile/{{$friend->receiving->name}}" class="small">Visit profile</a>
                    </div>
                </div>
            </div>
            @endforeach
            @if(!count($received))
              <div class="dropdown-item friend-request no-requests px-2 d-flex flex-row">
                <div class="empty-requests small mr-5 d-flex flex-column">
                    <div class="text-secondary mx-2 ">Nemate zahtjeva za prijateljstvo</div>
                </div>
              </div>
            @endif
        </div>
    </div>
</div>
@endsection