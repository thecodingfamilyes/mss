<h2>Inicio de sesión</h2>

{{ Former::vertical_open()->action('sessions') }}
	{{ Former::text('username')->label('Nombre de usuario') }}
	{{ Former::password('password')->label('Contraseña') }}
	{{ Former::submit('Entrar') }}
{{ Former::close() }}
