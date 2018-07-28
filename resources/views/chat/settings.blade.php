<div class="settings whileHidden">
	<div class="d-flex">
		<div class="settings-panel">
			<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
			  <div class="btn-group-vertical mr-2" role="group" aria-label="First group">
			    <button data-section="#general-settings-panel" type="button" class="settings-nav-btn btn btn-light bg-dark text-white">General</button>
			    <button data-section="#avatar-settings-panel" type="button" class="settings-nav-btn btn btn-light">Avatar</button>
			    <button data-section="#cover-settings-panel" type="button" class="settings-nav-btn btn btn-light">Cover</button>
			  </div>
			</div>
		</div>
		<form method="POST" action="/profile/update" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="text" value="{{ $chatUser->user_id }}" name="user_id" hidden>
			<div id="main-scroll-box" class="settings-forms flex-grow">
		    	<div id="general-settings-panel" class="settings-group form-group">
		    		<h3>Your alias</h3>
			    	<p>This will appear on your <mark>profile</mark>, and other users will see this when you write messages on <mark>chat</mark>.</p>
					<div class="input-group input-group-sm mb-4">
					    <div class="input-group-prepend">
					    	<div class="input-group-text small" id="btnGroupAddon">Alias</div>
					    </div>
					    <input type="text" 
					    	   class="form-control" 
					    	   rows="5" 
					    	   name="name" 
					    	   placeholder="Your alias"
					    	   value="{{ old('name', $chatUser->name) }}">
				  	</div>
		    		<h3>Your description</h3>
			    	<p>This will appear on your <mark>profile</mark>, and will be visible to all other users who visit.</p>
					<div class="input-group input-group-sm">
					    <div class="input-group-prepend">
					    	<div class="input-group-text small" id="btnGroupAddon">Description</div>
					    </div>
					    <textarea type="text" 
					    		  class="form-control" 
					    		  placeholder="Write something about yourself..." 
					    		  rows="5" 
					    		  name="description">{{ old('description', $chatUser->description) }}</textarea>
				  	</div>
		    	</div>
		    	<div id="avatar-settings-panel" class="settings-group form-group">
		    		<h3>Your avatar</h3>
			    	<p>Choose an <mark>avatar</mark> or upload one. This will be appear on your <mark>profile</mark> and as your <mark>user-icon</mark> visible on chat, visible to all other users</p>
					<div class="input-group input-group-sm">
					    <div class="input-group-prepend">
					    	<div class="input-group-text small" id="btnGroupAddon">Avatar</div>
					    </div>
						<input type="file" 
							   class="form-control" 
							   name="avatar" 
							   accept="image/x-png,image/jpeg" >
					</div>
			    	</div>
		    	<div id="cover-settings-panel" class="settings-group form-group">
		    		<h3>Your cover photo</h3>
			    	<p>This will appear on your <mark>profile</mark>, as a <mark>header cover</mark>.</p>
					<div class="input-group input-group-sm">
					    <div class="input-group-prepend">
					    	<div class="input-group-text small" id="btnGroupAddon">Cover</div>
					    </div>
						<input type="file" 
							   class="form-control" 
							   name="cover_photo">
					</div>
		    	</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary mb-2">Save changes</button>
				<p class="small text-secondary">All of your data will be previewed in the left column, but not updated until you save the changes.</p>
			</div>
			@include ('layouts.errors')
		</form>
	</div>
</div>

@section('pagespecific')
  <!-- Settings panels handler -->
  <script src="/js/settings.panel.js"></script>
  <link href="/css/settings.panel.css" rel="stylesheet">
@endsection