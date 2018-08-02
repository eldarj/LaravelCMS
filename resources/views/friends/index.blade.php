@extends ('layouts.master')

@section ('header')
	@include ('chat.header')
@endsection

@section ('content')

<div class="col-sm my-3">
    <h4 class="border-bottom border-gray pb-2 mb-3">Prijatelji</h6>
    <div class="friends-container friends">
        @foreach ($invited->where('confirmed', 1) as $key => $friend)
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
                        <span class="text-secondary small">Prijatelji od {{\Carbon\Carbon::parse($friend->updated_at)->format('d.m.Y')}}</span>
                    </div>
                </div>
                <div class="d-block mw-100">
                    <a href="/profile/{{$friend->receiving->name}}" class="small">Visit profile</a>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($received->where('confirmed', 1) as $key => $friend)
        <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
            <div class="friends-avatar mw-25 p-2 mr-2">
                <div class="border profile-pic friends-profile-img rounded-circle"
                     style="background-image:url('{{$friend->giving->avatar}}');"></div>
            </div>
            <div class="details mw-75 d-flex flex-column p-2">
                <div class="d-block mw-100">
                    <div class="friend-name flex-grow">
                    <span class="text-dark">{{$friend->giving->name}}</span>
                    </div>
                    <div class="friends-since mw-25">
                        <span class="text-secondary small">Prijatelji od {{\Carbon\Carbon::parse($friend->updated_at)->format('d.m.Y')}}</span>
                    </div>
                </div>
                <div class="d-block mw-100">
                    <a href="/profile/{{$friend->giving->name}}" class="small">Visit profile</a>
                </div>
            </div>
        </div>
        @endforeach
        @if(!count($invited->where('confirmed', 1)) && !count($received->where('confirmed', 1)))
          <div class="dropdown-item friend-request no-requests px-2 d-flex flex-row">
            @include('friends.pronadji')
          </div>
        @endif
    </div>
</div>
<div class="d-flex flex-row my-5">
    <div class="col-sm">
        <h4 class="border-bottom border-gray pb-2 mb-3">Vaši zahtjevi</h6>
        <div class="friends-container sent">
            @foreach ($invited->where('confirmed', 0) as $key => $friend)
            <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
                <div class="friends-avatar mw-25 p-2 mr-2">
                    <div class="border profile-pic friends-profile-img rounded-circle"
                         style="background-image:url('{{$friend->receiving->avatar}}');"></div>
                </div>
                <div class="details mw-50 d-flex flex-column p-2">
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
                <div class="actions mw-25 p-2 ml-auto d-flex flex-column justify-content-center">
                    <a href="/" class="btn btn-sm btn-light">Poništi zahtjev</a>
                </div>
            </div>
            @endforeach
        @if(!count($invited->where('confirmed', 0)))
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
            @foreach ($received->where('confirmed', 0) as $key => $friend)
            <div class="friends-wrap mx-2 my-1 p-3 bg-white rounded box-shadow d-flex flex-row">
                <div class="friends-avatar mw-25 p-2 mr-2">
                    <div class="border profile-pic friends-profile-img rounded-circle"
                         style="background-image:url('{{$friend->giving->avatar}}');"></div>
                </div>
                <div class="details mw-50 d-flex flex-column p-2">
                    <div class="d-block mw-100">
                        <div class="friend-name flex-grow">
                        <span class="text-dark">{{$friend->giving->name}}</span>
                        </div>
                        <div class="friends-since mw-25">
                            <span class="text-secondary">{{$friend->modified_at}}</span>
                        </div>
                    </div>
                    <div class="d-block mw-100">
                        <a href="/profile/{{$friend->giving->name}}" class="small">Visit profile</a>
                    </div>
                </div>
                <div class="actions mw-25 p-2 ml-auto d-flex flex-column justify-content-center">
                    <a href="{{route('friends.confirm', ['friend' => $friend->chat_user_id, 'route' => 'friends'])}}" 
                       class="btn btn-sm btn-primary">Prihvati zahtjev</a>
                </div>
            </div>
            @endforeach
            @if(!count($received->where('confirmed', 0)))
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