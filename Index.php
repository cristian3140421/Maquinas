<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- sirve para indicar al navegador que trabajaremos con responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #3b5798;
		}
		.down{
			margin-top: 170px;
		}
		.downcolor{
			background-color: #3b5798;
		}
		.btnentrar{
			margin-top: 10px;
			font-weight: bold;
		}
		.labelcolorwhite{
			font-weight: bold;
			font-size: 16px;
		}
		.labelbehind{
			margin-top: -10px;
		}
		.labelatras{
			z-index: -1;
		}
		.Login{
			margin-top: -10px;
			border-radius: 5px;
			background-color: #f5f5f5;
			padding: 10px;
			width: 150px;
		}
	</style>
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<div class="down labelatras" align="center">
					<label class="labelcolorwhite Login">Iniciar Sesion</label>
				</div>
				<div class="well labelbehind">
					<div>
						<label id="txtnombreusuario" class="labelcolorwhite">Usuario</label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="inputusuario" class="labelcolorwhite" placeholder="Usuario">
					</div>
					<div>
						<label id="txtnombrecontrasena" class="labelcolorwhite">Contraseña</label>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="inputcontrasena" placeholder="**************">
					</div>
					<div class="form-group" align="center">
						<input type="submit" class="btn btn-success btnentrar" name="btnentrar" value="Entrar">
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</body>
</html>