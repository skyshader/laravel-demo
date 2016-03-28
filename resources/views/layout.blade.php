<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Demo App | KleverKid</title>
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	@yield('styles')


</head>

<body>

	<div class="container">
		@yield('content')
	</div>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	@yield('scripts')
	<script src="/js/custom.js"></script>	
</body>
</html>