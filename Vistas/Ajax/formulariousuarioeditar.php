<div class="bajar">
	<div>
	<?php
	$i=0;
	$get = $_GET['id'];

	@include_once("../../Controlador/ControladorUsuario.php");
	$controlador = new ControladorUsuario();
	$resultado = $controlador->index();
	$resultadorol = $controlador->indexrol();
	while($row = mysqli_fetch_array($resultado)):
 		$nombre[$i] = $row["AES_DECRYPT(u.NombreUsuario,'Colombia')"];
 		if($nombre[$i]==$get){	
 	?>
 	<h1>Editar Usuario</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="tamaño">
			<tr>
				<td>
					<label>Nombre</label>
					<input type="text" name="inputnombreusuario" placeholder="Nombre" class="form-control" value="<?php echo $row["AES_DECRYPT(u.NombreUsuario,'Colombia')"]?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto</label>
					<input type="File" name="inputfotousuario" value="<?php echo $row['FotoUsuario']?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					<label>Contraseña</label>
					<input type="text" name="inputdecontrasenausuario"
					class="form-control" value="<?php echo $row["AES_DECRYPT(u.Contrasena,'Colombia')"]?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Rol</label>
					<select class="form-control" name="inputrolusuario" required>
						<option><?php echo $row['NombreRol'] ?></option>
						<?php
						while($raw = mysqli_fetch_array($resultadorol)):
							if($raw['Nombrerol'] != $row['NombreRol']){
						?>
							<option><?php echo $raw['Nombrerol'] ?></option>
						<?php
						}
						endwhile;
						?>
					</select>
				</td>
			</tr>
		</table><br>
		<input type="submit" name="Editar" class="btn btn-success" value="Editar">
		<input type="submit" name="Cancelar" class="btn btn-danger" value="Cancelar">
			<input type="text" name="inputnombreusuarioedit" placeholder="Nombre" style="visibility: hidden;" value="<?php echo $row["AES_DECRYPT(u.NombreUsuario,'Colombia')"]?>">
			<input type="text" name="inputfoto" value="<?php echo $row['FotoUsuario']?>" style="visibility: hidden;" class="form-control">
		</form>
		<?php 
		 }
		$i++;
		endwhile;
		?>
	</div>
</div>
<br><br>