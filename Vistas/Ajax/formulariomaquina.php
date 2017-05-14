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
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="tamaño">
			<tr>
				<td>
					<label>Nombre</label>
					<input type="text" name="inputnombremaquina" placeholder="Nombre"
					class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					<label>Fecha</label>
					<input type="date" name="inputfechamaquina"
					class="form-control" value="<?php echo $fecha['year']."-".$mon."-".$day;?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Denominacion</label>
					<input type="number" name="inputdenominacionmaquina"
					class="form-control" value="0">
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto</label>
					<input type="File" name="inputfotomaquina"
					class="form-control">
				</td>
			</tr>
		</table><br>
		<input type="submit" name="Registrar" class="btn btn-success" value="Registrar">
		</form>
	</div>
</div>
<br><br>