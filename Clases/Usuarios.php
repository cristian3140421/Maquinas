<?php
	//incluir Conexion
	include_once ('Conexion.php');
	class Usuario{

		//Atributos
		private $id;
		private $nombre;
		private $foto;
		private $contrasena;
		private $rol;
		

		private $con;

		//Metodos

		public function __construct(){
			$this->con = new Conexion();
		}
		public function set($atributo,$contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql = "CALL USP_ListarUsuario";
			$resultado = $this->con->ConsultaRetorno($sql);
			return $resultado;
		}
		public function listarrol(){
			$sql = "Call USP_Listarrol";
			$resultado = $this->con->ConsultaRetorno($sql);
			return $resultado;
		}
		public function crearactualizar(){
			$str = strtolower ("'{$this->nombre}'");
			$sql2 = "CALL USP_ConsultarUsuario ($str)";
			$resultado = $this->con->ConsultaRetorno($sql2);
			$num = mysqli_num_rows($resultado);
			if($num != 0){
				return false;
			}
			else{
			$sql="CALL USP_IngresarActualizarUsuario ($str,'{$this->foto}','{$this->contrasena}','{$this->rol}')";
			$this->con->ConsultaSimple($sql);
			return true;
			}

		}
		public function actualizarusuario(){
			$str = strtolower ("'{$this->nombre}'");
			$sql="CALL USP_IngresarActualizarUsuario ($str,'{$this->foto}','{$this->contrasena}','{$this->rol}')";
			$this->con->ConsultaSimple($sql);
			return true;
		}
		public function actualizarnombremaquina(){
			$sql2 = "CALL USP_ConsultarMaquina ('{$this->nombre}')";
			$resultado = $this->con->ConsultaRetorno($sql2);
			$num = mysqli_num_rows($resultado);
			while($row = mysqli_fetch_array($resultado)):
				 @$nombremaquina = $row['NombreMaquina'];
			endwhile;
			if(@$nombremaquina!=""){
				return false;
			}
			else{
			 $sql="Call USP_ActualizarNombreMaquina ('{$this->id}','{$this->nombre}')";
			$this->con->ConsultaSimple($sql);
			return true;
		}

		}
		public function eliminar(){
		    $sql = "CALL USP_EliminarMaquina ('{$this->nombre}')";
			$this->con->ConsultaSimple($sql);

		}
		public function ver(){
			$sql = "CALL USP_ConsultarMaquina ('{$this->nombre}')";
			$resultado = $this->con->ConsultaRetorno($sql);
			$row = mysqli_fetch_assoc($resultado);
			//set
			$this->nombre= $row ['nombre'];
			$this->fecha= $row ['fecha'];
			$this->denominacion= $row ['denominacion'];
			$this->foto= $row ['foto'];
			return $row;
		}
		public function Consultar(){
			$sql = "CALL USP_ConsultarMaquina ('{$this->nombre}')";
			$resultado = $this->con->ConsultaRetorno($sql);
			$num = mysqli_num_rows($resultado);

			if($num != 0){
				return true;
			}
			else{
				return false;
			}
	  	}
	}
?>