<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>{{ $title }}</title>

		<!-- css -->
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/custom.css') }}
	</head>

	<body>
	  	<!-- navigation menu -->
	    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">iPhoto</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ URL::route('home') }}">Home</a></li>
						@if(!Auth::check())
							<li><a href="{{ URL::route('login') }}">Login</a></li>
							<li><a href="{{ URL::route('registration') }}">Registration</a></li>
						@else
							<li><a href="{{ URL::route('account', Auth::user()->id) }}">Account</a></li>
							<li><a href="{{ URL::route('logout') }}">Logout</a></li>
							<li><a href="{{ URL::route('home') }}">Upload</a></li>
						@endif

					</ul>
				</div>
			</div>
	    </div>

	    <!-- main content -->
	    <div class="container">
	    	@yield('content')
	    </div>


	    <!-- javascripts -->
	    {{ HTML::script('js/jquery.min.js') }}
	    {{ HTML::script('js/bootstrap.min.js') }}
	    
	</body>

</html>
