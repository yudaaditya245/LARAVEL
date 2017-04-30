<!DOCTYPE html>
<html>
<head>
	  <title>USER</title>
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">

		<style media="screen">
			a:hover{
				text-decoration: none;
			}
		</style>
</head>
<body>

    <div class="container" style="margin-top:20px;">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">PANEL</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
												<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
											  <li class="@yield('user')"><a href="{{ url('/user') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; User</a></li>
                        <li class="@yield('blog')"><a href="{{ url('/blog') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Blog</a></li>
                        <li class="@yield('kategori')"><a href="#"><span class="glyphicon glyphicon-tag"></span>&nbsp; Kategori</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">ACTION</div>
                <div class="panel-body">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>

		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
