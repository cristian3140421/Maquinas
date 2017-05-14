<?php

	@include_once("../Controlador/ControladorUsuario.php");
	$controlador = new ControladorUsuario();
	$resultado = $controlador->index();
	$i=0;
	while($row = mysqli_fetch_array($resultado)):
 		$i++;
 	endwhile;
	if(isset($_POST['Registrar'])){
				$namefoto = @$_FILES['inputfotousuario']['name'];
				if($namefoto==""){
					$namefoto = "sinfoto.jpg";
				}
				$r = $controlador->crear(@$_POST['inputnombreusuario'],$namefoto,$_POST['inputdecontrasenausuario'],@$_POST['inputrolusuario']);
				/*$controlador->crearfoto();
				*/
				$nombre = $_POST['inputnombreusuario'];
				if($r){	
					 $mensaje = "<label class='alert alert-success'>El Usuario ".$nombre."  se guardo exitosamente  </label>"; 
					 $i++;
				}
				else{
					$mensaje = "<label class='alert alert-danger'> El Usuario ".$nombre." ya existe </label>";
				}
			}
			if(isset($_POST['Editar'])){
		 			$namefoto = @$_FILES['inputfotousuario']['name'];
					if($namefoto==""){
						$namefoto = $_POST['inputfoto'];
					}else{
						$namefoto = $_POST['inputfoto'];
						//$controlador->eliminarfoto($namefoto);
						//$controlador->crearfoto();
						$namefoto = @$_FILES['inputfotousuario']['name'];
					}
					$r=$controlador->actualizar(@$_POST['inputnombreusuario'],$namefoto,@$_POST['inputdecontrasenausuario'],@$_POST['inputrolusuario']);
					$mensaje = "<label class='alert alert-success'> Usuario  ".@$_POST['inputnombremaquinaedit']."  actualizado Exitosamente </label>";
				}
$resultado = $controlador->index();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuario</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- sirve para indicar al navegador que trabajaremos con responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/Maquina.css">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#Registrarusuario").click(function(event) {
					$("#capa").load('Ajax/formulariousuario.php');
				});
			});
			var vector = [];
			$(document).ready(function() {
				for (var va = 0; va < <?php echo $i ?>; va++){
					vector [va] = document.getElementById("inputtext"+va).value;
				}
				$(document).on("click", ".Editar", function(){
					var id = $(this).attr('id');
					$(".capa").load("Ajax/formulariousuarioeditar.php?id="+vector[id]);
					
				})
				var renombrar = [];
				for (var re = 0; re < <?php echo $i ?>; re++){
					 renombrar [re] = document.getElementById("inputtext"+re).value;
				}
				$(document).on("click", ".Renombrar", function(){
					var id = $(this).attr('id');
					$(".capa").load("Ajax/formulariomaquinarenombrar.php?id="+renombrar[id]);
					console.log(id);
					
				})
					
			});

		</script>
	<style type="text/css">
	body{
		padding: 10px;
	}
	<?php for ($css=0; $css <= $i ; $css++) { ?>
		#inputtext<?php echo $css ?>{
			visibility: hidden;	
		}
		<?php
		}?>
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<?php
		echo @$mensaje;
		?>
		<form action="" method="">
				<input type="button" id="Registrarusuario" name="Registrarusuario" value=" Registrar Usuario +" class="btn btn-success">
			</form>
			<div id="capa" class="capa">
					
			</div>
		<br>
			<div class="panel panel-primary">
				<div class="panel-heading">Maquinas</div>
			  <div class="panel-body">
			    <div class="table-responsive">
			    <form action="" method="post">
					<table class="table table-condensed">
					<tr>
							<th>
							<label>nombre</label>
							</td>
							<th>
								<label>Foto</label>
							</th>
							<th>
								<label>Contraseña</label>
							</th>
							<th>
								<label>Rol</label>
							</th>
							<th>
								
							</th>
							<th>
								
							</th>							
					</tr>
					<?php
						$i=0;
						while($row = mysqli_fetch_array($resultado)):
						?>
						<tr>
							<td>
								<label><?php echo $row["AES_DECRYPT(u.NombreUsuario,'Colombia')"]?></label>
							</td>

							<input type="text" name="inputfotoo" value="<?php echo $row['FotoUsuario']?>" class="form-control hidden">
							<input type="text"  id="inputtext<?php echo $i ?>" name="inputtext<?php echo $i?>" value="<?php echo $row["AES_DECRYPT(u.NombreUsuario,'Colombia')"]?>">
							<td>
								<label><?php echo $row['FotoUsuario']?></label>
							</td>
							<td>
								<label><?php echo $row["AES_DECRYPT(u.Contrasena,'Colombia')"]?></label>
							</td>
							<td>
								<label><?php echo $row['NombreRol']?></label>
							</td>
							<td class="max">
								<input type="button" id="<?php echo $i ?>" name="btneditar<?php echo $i?>" value="Editar" class="btn btn-primary Editar">
							</td>
							<td class="max">
								<input type="submit" name="btneliminar" value="Eliminar" class="btn btn-primary ">
							</td>
						</tr>
						<?php
						$i++;
						endwhile;
						?>
						</table>
						</form>
				</div>
			  </div>
	</div>
</div>
</body>
</html>