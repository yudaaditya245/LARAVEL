<!DOCTYPE html>
<html>
<head>
	  <title>@yield('title')</title>
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">

		<style media="screen">
			a:hover{
				text-decoration: none;
			}
		</style>
</head>
<body>
		<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ url('/') }}">LARAVEL BLOG</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
								@if(isset($kategori) > 0)
										@foreach($kategori as $kat)
												@if(isset($id) && $id == $kat->id)
														<li class="active"><a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a></li>
												@else
														<li><a href="<?= url('/blog/filter/'.$kat->id) ?>">{{ $kat->kategori }}</a></li>
												@endif
										@endforeach
								@endif
						</ul>
						<ul class="nav navbar-nav navbar-right">
							@if(session('is_login') == 1)
									@if(session('level') == 0)
									<li><a href="<?= url('/user/profile/'.@session('user_id')) ?>"><span class="glyphicon glyphicon-user"></span>&nbsp; {{ session('fname') }}</a></li>
									@else
									<li><a href="<?= url('/user/profile/'.@session('user_id')) ?>"><span class="glyphicon glyphicon-user"></span>&nbsp; {{ session('fname') }}</a></li>
									@endif
							<li><a href="{{ url('/user/logout') }}"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
							@else
							<li><a href="{{ url('/user/register') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li>
							<li><a href="<?= url('/user/login') ?>"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li>
							@endif
						</ul>
					</div>
				</div>
		</nav>

    <div class="container">
			  <div class="col-md-10">
				    <div class="panel panel-primary" style="margin-top:20px;">
				  	    <div class="panel-heading">@yield('heading')</div>
				  	    <div class="panel-body">
				  	    	  @yield('body')
				    	  </div>
				    	  <div class="panel-footer" style="font-size:0.9em">
				    	    	Copyright &copy; 2017, LARAVEL BLOG
			  	  	  </div>
		  		  </div>
			  </div>
    </div>
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
