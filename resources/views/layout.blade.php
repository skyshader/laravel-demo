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

	<nav class="navbar navbar-default navbar-fixed-top custom-nav">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">
					<i class="glyphicon glyphicon-education"></i>
				</a>
				<a class="navbar-brand" href="/">Academia</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
	        	<li class="{{ \Request::is('explore') ? 'active' : '' }}">
	        		<a href="/explore">
	        			<i class="glyphicon glyphicon-th"></i> Explore
	        		</a>
	        	</li>
	        	<li class="{{ \Request::is('academy/create') ? 'active' : '' }}">
	        		<a href="/academy/create">
	        			<i class="glyphicon glyphicon-plus"></i> Create
	        		</a>
	        	</li>
	        </ul>
		</div>
	</nav>

	<div class="container top-level">
		@yield('content')
	</div>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	@yield('scripts')
	<script src="/js/custom.js"></script>	
</body>
</html>