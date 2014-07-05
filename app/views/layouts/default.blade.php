<!doctype html>
<html lang="es">
<head>
	<title>MSS</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	{{ HTML::style('css/styles.css'); }}
</head>
<body>
	<!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MSS</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/">Home</a></li>
            </ul>

            @include('toolbar/login')

          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container">
        {{ Notification::showAll() }}

        @yield('content')
      </div>

      <div id="root-footer"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>

     {{ Html::script('js/lib/jquery.js') }}
     {{ HTML::script('js/bootstrap/transition.js') }}
     {{ HTML::script('js/bootstrap/collapse.js') }}
     {{ HTML::script('js/bootstrap/alert.js') }}

</body>
</html>