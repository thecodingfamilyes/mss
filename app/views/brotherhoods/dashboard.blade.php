@extends('layouts.default')

@section('content')
<div id="dashboard" class="brotherhoods dashboard" ng-controller="BrotherhoodController">
	<div class="brotherhoods-toolbar navbar">
		<ul class="nav navbar-nav navbar-default">
			<li>
				<a href="#" class="btn btn-default">
					<i class="fa fa-plus fa-fw"></i>
					Crear hermandad
				</a>
			</li>
		</ul>
	</div>
	<div class="brotherhoods-list">
		<ul ng-repeat="brotherhood in brotherhoods">
			<li>@{{brotherhood.name}}</li>
		</ul>
	</div>
</div>
@stop