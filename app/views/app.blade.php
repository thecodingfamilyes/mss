@extends('layouts.default')

@section('content')
<div class="container-fluid app-root" id="app-root" data-user="{{Auth::user()}}">
	<div ng-view>
		<div>
			<span class="label label-info">cargando...</span>
		</div>
	</div>
</div>
@stop