<h2>Sign in</h2>

{{ Former::framework('TwitterBootstrap3'); }}
{{ Former::vertical_open()->action('sessions') }}
	{{ Former::text('username') }}
	{{ Former::password('password') }}
	{{ Former::submit('Sign in') }}
{{ Former::close() }}
