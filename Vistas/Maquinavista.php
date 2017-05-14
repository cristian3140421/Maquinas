<?php
	@include_once("../Controlador/ControladorMaquina.php");
	$controlador = new ControladorMaquina();
	$resultado = $controlador->index();
	$i=0;
	while($row = mysqli_fetch_array($resultado)):
 		$i++;
 	endwhile;
	if(isset($_POST['Registrar'])){
				$namefoto = @$_FILES['inputfotomaquina']['name'];
				if($namefoto==""){
					$namefoto = "sinfoto.jpg";
				}
				$r = $controlador->crear(@$_POST['inputnombremaquina'],$_POST['inputfechamaquina'],@$_POST['inputdenominacionmaquina'],$namefoto);
				$controlador->crearfoto();
				
				$nombre = $_POST['inputnombremaquina'];
				if($r){	
					 $mensaje = "<label class='alert alert-success'>La Maquina ".$nombre."  se guardo exitosamente  </label>"; 
					 $i++;
				}
				else{
					$mensaje = "<label class='alert alert-danger'> La Maquina ".$nombre." ya existe </label>";
				}
			}
			for ($valor = 0; $valor < $i ; $valor++) { 
		 		if(isset($_POST['btneliminar'.$valor])){
					 $r=$controlador->eliminar(@$_POST['inputtext'.$valor]);
					 $namefoto = $_POST['inputfotoo'];
					 $controlador->eliminarfoto($namefoto);
					 $maquina = @$_POST['inputtext'.$valor];
					$mensaje = "<label class='alert alert-success'> Maquina ". $maquina." Eliminada Exitosamente </label>";
					$i--;
				}	
		 	}
		 		if(isset($_POST['Editar'])){
		 			$namefoto = @$_FILES['inputfotomaquina']['name'];
					if($namefoto==""){
						$namefoto = $_POST['inputfoto'];
					}else{
						$namefoto = $_POST['inputfoto'];
						$controlador->eliminarfoto($namefoto);
						$controlador->crearfoto();
						$namefoto = @$_FILES['inputfotomaquina']['name'];
					}
					$r=$controlador->actualizar(@$_POST['inputnombremaquinaedit'],$_POST['inputfechamaquinaedit'],@$_POST['inputdenominacionmaquinaedit'],$namefoto);
					$mensaje = "<label class='alert alert-success'> Maquina  ".@$_POST['inputnombremaquinaedit']."  actualizada Exitosamente </label>";
				}
				if(isset($_POST['Renombrar'])){
		 			$namefoto = @$_FILES['inputfotomaquinaedit']['name'];
					if($namefoto==""){
						$namefoto = "sinfoto.jpg";
					}
					$r=$controlador->actualizarnombre($_POST['idmaquina'],@$_POST['inputnombremaquina']);
					if($r){
					$mensaje = "<label class='alert alert-success'> Maquina Renombrada Exitosamente </label>";
					}else{
						$mensaje ="<label class='alert alert-danger'> La Maquina ".@$_POST['inputnombremaquina']." ya existe </label>";
					}
					
				}

		 	
			$resultado = $controlador->index();
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
			var vector = [];
			$(document).ready(function() {
				for (var va = 0; va < <?php echo $i ?>; va++){
					vector [va] = document.getElementById("inputtext"+va).value;
				}
				$(document).on("click", ".Editar", function(){
					var id = $(this).attr('id');
					$(".capa").load("Ajax/formulariomaquinaeditar.php?id="+vector[id]);
					
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
		<div class="col-md-12">
			<?php
			echo @$mensaje;
			?>
			<form action="" method="">
				<input type="button" id="RegistrarMaquina" name="RegistrarMaquina" value=" Registrar Maquina +" class="btn btn-success">
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
							<label>nombremaquina</label>
							</td>
							<th>
								<label>Fecha de ingreso</label>
							</th>
							<th>
								<label>Denominacion</label>
							</th>
							<th>
								<label>Foto</label>
							</th>
							<th>
								
							</th>
							<th>
								
							</td>
							<td></td>
					</tr>
					<?php 
							$i=0;
							while($row = mysqli_fetch_array($resultado)):
					?>
						<tr>
							<td>
								<label><?php echo $row['NombreMaquina']?></label>
							</td>
							<input type="text" name="inputfotoo" value="<?php echo $row['FotoMaquina']?>" style="visibility: hidden;" class="form-control">
							<input type="text" class="hideen" id="inputtext<?php echo $i ?>" name="inputtext<?php echo $i?>" value="<?php echo $row['NombreMaquina']?>">
							<td>
								<label><?php echo $row["DATE_FORMAT(FechaIngreso, '%d/%m/%Y')"]?></label>
							</td>
							<td>
								<label><?php echo $row['Denominacion']?></label>
							</td>
							<td>
								<img src="../Imagenes/FotoMaquina/<?php echo $row['FotoMaquina']?>" width="50px" height="40px;">
							</td>
							<td class="max">
								<input type="button" id="<?php echo $i ?>" name="btneditar<?php echo $i?>" value="Editar" class="btn btn-primary Editar">
							</td>
							<td class="max">
								<input type="submit" id="eliminar<?php echo $i?>"  name="btneliminar<?php echo $i?>" value="Eliminar" class="btn btn-primary ">
							</td>
							<td class="max">
								<input type="button" id="<?php echo $i?>" name="btnrenombrar" value="Renombrar" class="btn btn-primary Renombrar">
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
</div>
</body>
</html>