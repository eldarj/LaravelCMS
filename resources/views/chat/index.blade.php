@extends ('layouts.master')

@section ('header')
	@include ('articles.header')
@endsection

@section ('content')
<?php $isme = false; ?>

<div class="row">
	<div class="my-3 mx-2 p-3 bg-white rounded box-shadow col-sm">
		<h6 class="border-bottom border-gray pb-2 mb-0">Welcome to the Chat</h6>
		@foreach ($messages as $key => $message)
			@if($message->user->chatUser->id === auth()->user()->chatUser->id)
				<?php $isme = true; ?>
			@endif
			<div class="pt-1">
		        <div class="mw-75 d-flex @if($isme) flex-row-reverse @endif">
					<div class="message-left d-inline-block mx-1 mt-1">
						<div class="border message-profile-pic rounded-circle @if($message->hideimg) invisible @endif"
							 style="background-image:url('{{ $message->user->chatUser->avatar }}');">
						</div>
					</div>
					<div class="message-right d-inline-block">
						<div class="message-text d-inline-block small py-2 px-3 border rounded shadow-sm @if($isme) bg-info text-white @else bg-light text-dark @endif">
							{{ $message->message_text }}
						</div>
						@if(!$message->hidetimestamp)
						<div class="message-time d-block my-1 small text-minimal @if($isme) text-right @endif">
							{{ $message->created_at->toFormattedDateString('') }}
						</div>
						@endif
					</div>
		        </div>
		    </div>
		@endforeach

		<small class="d-block text-right mt-3">
		  @include ('chat.write')
		</small>
	</div>
</div>
@endsection