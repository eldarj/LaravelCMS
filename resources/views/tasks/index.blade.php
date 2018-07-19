<!DOCTYPE html>
<html>
<head>
	<title>About MyApp</title>
</head>
<body>
	<div class="main">
		Welcome to my tasks
	</div>
	<div class="tasks">
		@foreach ($tasks as $key => $task)
			<a href="/tasks/{{$task->id}}" target="_blank">
				<h1>{{$task->title}}</h1>
				<p>{{$task->body}}</p>
			</a>
		@endforeach
	</div>
</body>
</html>