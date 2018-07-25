<form method="POST" action="/chat">
  {{ csrf_field() }}
  <div class="form-group">
    <textarea class="form-control form-control-sm" id="messageInput" name="message_text" aria-describedby="messageHelp" placeholder="Say hi!" required></textarea>
    <small id="messageHelp" class="form-text text-muted">Your message</small>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary">Write</button>
  </div>
  @include ('layouts.errors')
</form>
