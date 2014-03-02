@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-8 sign-up">
			<h2>Registro</h2>

			{{ Former::vertical_open()->action('users')->rules(User::$rules) }}
				{{ Former::text('username')->help('El nombre que usarás para iniciar sesión, sólo puede contenter letras, números, guiones y subrayados (_).')->label('Nombe de usuario') }}
				{{ Former::email('email') }}
				{{ Former::text('display_name')->help('Este es el nombre que los demás usuarios podrán ver.')->label('Apodo') }}
				{{ Former::password('password')->label('Contraseña')->help('Cuanto más larga y complicada sea, más segura será tu contraseña.') }}
				{{ Former::password('password_confirmation')->label('Repite la contraseña') }}

				<div class="captcha-field">
				 	{{
				 		Former::text('captcha')
				 			->prepend(HTML::image(Captcha::img(), 'Captcha image'))
				 			->help('Escribe los caracteres que ves en la imagen. Esto sirve para asegurarnos de que no eres un bot :)')
				 	}}

				</div>

				{{ Former::checkbox('terms')->label(null)->text('He leído y acepto las <a href="/terms">condiciones de uso</a>')->inline() }}

				{{ Former::submit('Registrarse!') }}
			{{ Former::close() }}
		</div>

		<div class="col-md-4 sign in">
			{{ View::make('sessions/create') }}
		</div>
	</div>

@stop