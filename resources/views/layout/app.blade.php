<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="vieport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		@stack('prepend-style')
		@include('include.style')
		@stack('addon-style')
	</head>
	<body>
	@include('include.navbar')

	@yield('content')

	@include('include.footer')

	@stack('prepend-script')
	@include('include.script')
	@stack('addon-script')
		
	</body>
</html>