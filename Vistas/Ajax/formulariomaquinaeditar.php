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
	<div>
	<?php
	$i=0;
	$get = $_GET['id'];
	@include_once("../../Controlador/ControladorMaquina.php");
	$controlador = new ControladorMaquina();
	$resultado = $controlador->indexfor();
	while($row = mysqli_fetch_array($resultado)):
 		$nombre[$i] = $row['NombreMaquina'];
 		if($nombre[$i]==$get){	
 	?>
 	<h1>Registrar Maquina</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="tamaño">
			<tr>
				<td>
					<label>Nombre</label>
					<input type="number" name="inputnombremaquinaedit" placeholder="Nombre" class="form-control" value="<?php echo $row['NombreMaquina']?>" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label>Fecha</label>
					<input type="date" name="inputfechamaquinaedit"
					class="form-control" value="<?php echo $row['FechaIngreso']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Denominacion</label>
					<input type="number" name="inputdenominacionmaquinaedit"
					class="form-control" value="<?php echo $row['Denominacion']?>" placeholder="0" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto</label>
					<input type="File" name="inputfotomaquina" value="<?php echo $row['FotoMaquina']?>" class="form-control">
				</td>
			</tr>
		</table><br>
		<input type="submit" name="Editar" class="btn btn-success" value="Editar">
		<input type="submit" name="Cancelar" class="btn btn-danger" value="Cancelar">
			<input type="text" name="inputnombremaquinaedit" placeholder="Nombre" style="visibility: hidden;" value="<?php echo $row['NombreMaquina']?>">
			<input type="text" name="inputfoto" value="<?php echo $row['FotoMaquina']?>" style="visibility: hidden;" class="form-control">
		</form>
		<?php 
		 }
		$i++;
		endwhile;
		?>
	</div>
</div>
<br><br>