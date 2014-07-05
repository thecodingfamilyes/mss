<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Recuperación de contraseña</h2>

		<div>
			Para recuperar tu contraseña, accede a la siguiente página: <br>{{ link_to('password/reset/'.$token) }}.
		</div>
	</body>
</html>