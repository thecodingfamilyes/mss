<!doctype html>
<html lang="es" ng-app="mss">
<head>
	<title>MSS</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link href='http://fonts.googleapis.com/css?family=Lato|PT+Sans|Inconsolata' rel='stylesheet' type='text/css'>
	{{ HTML::style('css/styles.css'); }}
</head>
<body>
	<!-- Wrap all page content here -->
    <div id="wrap">

      <header>
        @include('common/header')
      </header>

      <!-- Begin page content -->
      <div class="container">
        {{ Notification::showAll() }}

        @yield('content')
      </div>

      <div id="root-footer"></div>
    </div>

    <div id="footer">
      @include('common/footer')
    </div>

     {{ Html::script('js/lib/jquery.js') }}
     {{ Html::script('js/lib/underscore.js') }}
     {{ Html::script('js/lib/angular.js') }}
     {{ Html::script('js/lib/restangular.js') }}
     {{ Html::script('js/lib/angular-route.js') }}
     {{ Html::script('js/lib/angular-resource.js') }}
     {{ Html::script('js/lib/ui-bootstrap.js') }}
     {{ Html::script('js/bootstrap/dropdown.js') }}


     {{ HTML::script('js/mss/app.js') }}
     {{ HTML::script('js/mss/common/services/me.js') }}
     {{ HTML::script('js/mss/common/services/api.js') }}
     {{ HTML::script('js/mss/brotherhoods/controllers/userListCtrl.js') }}




</body>
</html>