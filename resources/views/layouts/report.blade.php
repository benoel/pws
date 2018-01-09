<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ASEMKA">
	<meta name="robots" content="all,follow">
	<title>{{ config('app.name') }}</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/css/style.sea.css') }}" rel="stylesheet">

	<script src="{{ asset('vendor/js/jquery-1.11.0.min.js') }}"></script>
	<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>

</head>
<body>
	@yield('content')
</body>
</html>
