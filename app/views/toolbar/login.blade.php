@if (!Auth::check())
	{{ Former::open()->class('navbar-form navbar-right')->action('/sessions')->role('form') }}
		{{ Former::text('username')->label(null)->placeholder('Username') }}
		{{ Former::password('password')->label(null)->placeholder('Password') }}

		<button type="submit" class="btn btn-default">
			<i class="fa fa-unlock-alt fa-fw"></i>
			Entrar
		</button>

		<a href="/users/create" class="btn btn-primary"><i class="fa fa-"></i> Nuevo usuario</a>
	{{ Former::close() }}
@else
	<div class="navbar-right">
		<div class="navbar-text logged-in userdata">
			<i class="fa fa-user fa-fw"> </i>Hola <a href="/profile">{{ Auth::user()->display_name }}</a>
		</div>

		<ul class="nav navbar-nav">
			<li class="dropdown">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-fw"></i> <i class="fa fa-caret-down fa-fw"></i></a>
				<ul class="dropdown-menu pull-right" role="menu">
					<li>
						<a href="/logout"><i class="fa fa-power-off fa-fw"></i> cerrar sesión</a>
					</li>
				</ul>

			</li>
		</ul>

	</div>

@endif