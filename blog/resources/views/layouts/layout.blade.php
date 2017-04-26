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
</body>
</html>
