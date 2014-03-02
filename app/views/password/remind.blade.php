@extends('layouts.default')

@section('content')
	<h2>Recuperación de contraseña</h2>

	<p>Si has perdido tu contraseña, introduce tu email en el formulario y te enviaremos un enlace a tu bandeja de entrada con el que podrás crear una nueva.</p>

	<div class="recover-form">
		{{ Former::inline_open()->action(action('RemindersController@getRemind'))->rules(User::$rules) }}
			{{ Former::email('email') }}
			{{Former::submit('Enviar') }}
		{{ Former::close() }}
	</div>
@stop