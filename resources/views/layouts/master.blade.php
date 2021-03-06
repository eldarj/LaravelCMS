<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Album example for Bootstrap</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/css/offcanvas.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
    <!-- Custom sass -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="/css/magnific-popup.css">
  </head>
  <body class="bg-light">
    <div id="main-body" class="max-display vert-scroll">
      @include ('layouts.navbar')

      @include ('layouts.subnav')

      @if ($flash = session('message'))
        <div id="main-flash-message" class="alert alert-success" role="alert">
          {{ $flash }}
        </div>
      @endif

      
      <div class="header-wrap position-relative all-childs-relative">
        @yield ('header')
      </div>

        <main role="main" class="py-4 container">
          @yield ('content')

          @include ('layouts.aftercontent')
        </main>

        @include ('layouts.footer')

      @if (auth()->user() && !auth()->user()->chatUser)
        @include ('layouts.floaters.chat')
      @endif
    </div>
  </body>
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <!-- JqueryUI -->

  <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
  <!-- Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <!-- Offcanvas -->
  <script src="/js/offcanvas.js"></script>
  <!-- magnific popup.js -->
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <!-- app.js -->
  <script src="/js/app.js"></script>
  @yield('pagespecific')
</html>
