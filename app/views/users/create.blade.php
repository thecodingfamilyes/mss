@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-8 sign-up">
			<h2>Sign up</h2>

			{{ Former::framework('TwitterBootstrap3') }}
			{{ Former::vertical_open()->action('users') }}
				{{ Former::text('username')->help('El nombre que usarás para iniciar sesión, sólo puede contenter letras, números, guiones y subrayados (_).') }}
				{{ Former::email('email') }}
				{{ Former::text('display_name')->help('Este es el nombre que los demás usuarios podrán ver.') }}
				{{ Former::password('password') }}
				{{ Former::password('password_confirmation') }}

				 {{ Former::checkbox('terms')->label('He leído y acepto las condiciones de uso') }}

				{{ Former::submit('Sign up') }}
			{{ Former::close() }}
		</div>

		<div class="col-md-4 sign in">
			{{ View::make('sessions/create') }}
		</div>
	</div>

@stop