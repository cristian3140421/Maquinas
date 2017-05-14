<?php
	@include_once("../../Controlador/ControladorUsuario.php");
	$controlador = new ControladorUsuario();
	$resultado = $controlador->indexrol();
?>
<div class="bajar">
<h1>Registrar Usuario</h1>
	<br>
	<div>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="tamaño">
			<tr>
				<td>
					<label>Nombre</label>
					<input type="text" name="inputnombreusuario" placeholder="Nombre"
					class="form-control" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Foto</label>
					<input type="File" name="inputfotousuario"
					class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					<label>Contraseña</label>
					<input type="text" name="inputdecontrasenausuario"
					class="form-control" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Rol</label>
					<select class="form-control" name="inputrolusuario" required>
						<?php
						while($row = mysqli_fetch_array($resultado)):
						?>
							<option><?php echo $row['Nombrerol'] ?></option>
						<?php
						endwhile;
						?>
					</select>
				</td>
			</tr>
		</table><br>
		<input type="submit" name="Registrar" class="btn btn-success" value="Registrar">
		</form>
	</div>
</div>
<br><br>