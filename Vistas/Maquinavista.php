<?php
	@include_once("../Controlador/ControladorMaquina.php");
	$controlador = new ControladorMaquina();
	if(isset($_POST['Registrar'])){
				$namefoto = @$_FILES['inputfotomaquina']['name'];
				$r = $controlador->crear(@$_POST['inputnombremaquina'],$_POST['inputfechamaquina'],@$_POST['inputdenominacionmaquina'],$namefoto);
				$nombre = $_POST['inputnombremaquina'];
				if($r){	
					 $mensaje = "<label class='alert alert-success'>La Maquina ".$nombre."  se guardo exitosamente  </label>"; 
				}
				else{
					$mensaje = "<label class='alert alert-danger'> La Maquina ".$nombre." ya existe </label>";
				}
			}
			
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- sirve para indicar al navegador que trabajaremos con responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/Maquina.css">
	<title>Maquina</title>
	<style type="text/css">
		body{
			padding: 10px;
		}
	</style>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				$("#RegistrarMaquina").click(function(event) {
					$("#capa").load('Ajax/formulariomaquina.php');
				});
			});
		</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			echo @$mensaje;
			?>
			<form action="" method="">
				<input type="button" id="RegistrarMaquina" name="RegistrarMaquina" value=" Registrar Maquina +" class="btn btn-success">
			</form>
			<div id="capa">
					
			</div>
		<br>
			<div class="panel panel-primary">
				<div class="panel-heading">Maquinas</div>
			  <div class="panel-body">
			    <div class="table-responsive">
					<table class="table table-condensed">
					<tr>
						<td>
							<label>nombremaquina</label>
							</td>
							<td>
								<label>Fecha de ingreso</label>
							</td>
							<td>
								<label>Denominacion</label>
							</td>
							<td>
								<label>Foto</label>
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td></td>
					</tr>
						<tr>
							<td>
								<label>nombremaquina</label>
							</td>
							<td>
								<label>Fecha de ingreso</label>
							</td>
							<td>
								<label>Denominacion</label>
							</td>
							<td>
								<label>Foto</label>
							</td>
							<td class="max">
								<input type="submit" name="btneditar" value="Editar" class="btn btn-primary">
							</td>
							<td class="max">
								<input type="submit" name="btneliminar" value="Eliminar" class="btn btn-primary">
							</td>
							<td class="max">
								<input type="submit" name="btnrenombrar" value="Renombrar" class="btn btn-primary">
							</td>
						</tr>
						</table>
				</div>
			  </div>
			</div>
		</div>
</div>
</body>
</html>