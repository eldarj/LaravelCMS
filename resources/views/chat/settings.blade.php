<div class="settings">
	<div class="settings-button">
		<i class="fas fa-cog"></i>
	</div>
	<div class="d-flex">
		<div class="settings-panel">
			<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
			  <div class="btn-group-vertical mr-2" role="group" aria-label="First group">
			    <button data-section="#general-settings-panel" type="button" class="settings-nav-btn btn btn-secondary">General</button>
			    <button data-section="#avatar-settings-panel" type="button" class="settings-nav-btn btn btn-secondary">Avatar</button>
			    <button data-section="#cover-settings-panel" type="button" class="settings-nav-btn btn btn-secondary">Cover</button>
			  </div>
			</div>
		</div>
		<div id="main-scroll-box" class="settings-forms flex-grow">
	    	<div id="general-settings-panel" class="settings-group form-group">
	    		<h3>Your description</h3>
		    	<p>This will appear on your <mark>profile</mark>, and will be visible to all other users who visit.</p>
				<div class="input-group input-group-sm">
				    <div class="input-group-prepend">
				    	<div class="input-group-text small" id="btnGroupAddon">Description</div>
				    </div>
				    <textarea type="text" class="form-control" placeholder="Write something about yourself..." rows="5" name="description"></textarea>
			  	</div>
	    	</div>
	    	<div id="avatar-settings-panel" class="settings-group form-group">
	    		<h3>Your avatar</h3>
		    	<p>Choose an <mark>avatar</mark> or upload one. This will be appear on your <mark>profile</mark> and as your <mark>user-icon</mark> visible on chat, visible to all other users</p>
				<div class="input-group input-group-sm">
				    <div class="input-group-prepend">
				    	<div class="input-group-text small" id="btnGroupAddon">Avatar</div>
				    </div>
					<input type="file" class="form-control" name="avatar_file">
				</div>
		    	</div>
	    	<div id="cover-settings-panel" class="settings-group form-group">
	    		<h3>Your cover photo</h3>
		    	<p>This will appear on your <mark>profile</mark>, as a <mark>header cover</mark>.</p>
				<div class="input-group input-group-sm">
				    <div class="input-group-prepend">
				    	<div class="input-group-text small" id="btnGroupAddon">Cover</div>
				    </div>
					<input type="file" class="form-control" name="cover_file">
				</div>
	    	</div>
		</div>
	</div>
		<span class="small text-secondary">All of your data will be previewed in the left column, but not updated until you save the changes.</span>
</div>

@section('pagespecific')
  <!-- Settings panels handler -->
  <script src="/js/settings.panel.js"></script>
  <link href="/css/settings.panel.css" rel="stylesheet">
@endsection