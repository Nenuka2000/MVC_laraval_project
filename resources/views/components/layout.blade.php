<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? env('APP_NAME')}}</title>
	@vite('resources/css/app.css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
	<div class="flex">
		<x-sidebar />
		<div class="w-full h-screen overflow-auto">
			{{ $slot }}
		</div>
	</div>
</body>

</html>