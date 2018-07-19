<!DOCTYPE html>
<html>
<head>
	<title>My App</title>
</head>
<body>
	<header>
		Nav<br>
		---
	</header><br>
	<div class="container">
		@yield('content')
	</div><br>
	<footer>
		---<br>
		@yield('footer')<br>
		---
	</footer>	
</body>
</html>