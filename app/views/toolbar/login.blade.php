@if (!Auth::check())
	{{ Former::open()->class('navbar-form navbar-right')->action('/sessions')->role('form') }}
		{{ Former::text('username')->label(null)->placeholder('Username') }}
		{{ Former::password('password')->label(null)->placeholder('Password') }}

		{{ Former::submit('Sign in') }}

		<a href="/users/create">Sign up</a>
	{{ Former::close() }}
@else
	<div class="navbar-right">
		<div class="logged-in userdata">
			Hola {{ Auth::user()->display_name }} <a href="/profile">perfil</a> | <a href="/logout">cerrar sesión</a>
		</div>
	</div>

@endif