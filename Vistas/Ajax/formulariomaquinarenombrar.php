<?php

	$fecha =getdate();
	$day = $fecha['mday'];
	$day = $day-1;
	$mon = $fecha['mon'];
	if($mon<10){
		$mon = "0".$mon;
	}
	if($day<10){
		$day = "0".$day;
	}


?>
<div class="bajar">
<h1>Registrar Maquina</h1>
	<br>
	<div>
	<?php
	$i=0;
	$get = $_GET['id'];
	@include_once("../../Controlador/ControladorMaquina.php");
	$controlador = new ControladorMaquina();
	$resultado = $controlador->index();
	while($row = mysqli_fetch_array($resultado)):
 		$nombre[$i] = $row['NombreMaquina'];
 		if($nombre[$i]==$get){	
 	?>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="tamaño">
			<input type="text" name="idmaquina" placeholder="Nombre"
					class="form-control" style="visibility: hidden;" value="<?php echo $row['IdMaquina']?>" required>
			<tr>
				<td>
					<label>Nombre</label>
					<input type="number" name="inputnombremaquina" placeholder="Nombre"
					class="form-control" value="<?php echo $row['NombreMaquina']?>" required>
				</td>
			</tr>
		</table><br>
		<input type="submit" name="Renombrar" class="btn btn-success" value="Renombrar">
		<input type="submit" name="Cancelar" class="btn btn-danger" value="Cancelar">
		</form>
		<?php 
		 }
		$i++;
		endwhile;
		?>
	</div>
</div>
<br><br>