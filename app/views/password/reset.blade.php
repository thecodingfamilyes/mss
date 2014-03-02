@extends('layouts.default')

@section('content')
	<h2>Recuperación de contraseña</h2>

	<p>Introduce tu nueva contraseña en el formulario para recuperar tu cuenta.</p>

	<div class="recover-form">
		{{ Former::vertical_open()->action(action('RemindersController@postReset'))->rules(User::$rules) }}
			{{ Former::hidden('token')->value($token);  }}
			{{ Former::email('email') }}

			{{ Former::password('password')->label('Contraseña')->help('Cuanto más larga y complicada sea, más segura será tu contraseña.') }}
			{{ Former::password('password_confirmation')->label('Repite la contraseña') }}
			{{ Former::submit('Enviar') }}
		{{ Former::close() }}
	</div>
@stop