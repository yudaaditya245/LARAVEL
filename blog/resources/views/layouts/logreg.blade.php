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

    <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
			  <h2>@yield('heading')</h2>
        <div class="panel panel-info">
            <!-- <div class="panel-heading">@yield('heading')</div> -->
            <div class="panel-body">
                @yield('body')
            </div>
            <!-- <div class="panel-footer">
                @yield('footer')
            </div> -->
        </div>
    </div>

		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
