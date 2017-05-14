<?php
	//incluir Conexion
	include_once ('Conexion.php');
	class Maquina{

		//Atributos
		private $id;
		private $nombre;
		private $fecha;
		private $denominacion;
		private $foto;

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
			$sql = "CALL USP_ListarMaquina";
			$resultado = $this->con->ConsultaRetorno($sql);
			return $resultado;
		}
		public function listarformato(){
			$sql = "Select * from tbl_Maquina where activo = 1";
			$resultado = $this->con->ConsultaRetorno($sql);
			return $resultado;
		}
		public function crearactualizar(){
			$sql2 = "CALL USP_ConsultarMaquina ('{$this->nombre}')";
			$resultado = $this->con->ConsultaRetorno($sql2);
			$num = mysqli_num_rows($resultado);

			if($num != 0){
				return false;
			}
			else{
			$sql="CALL USP_IngresarActualizarMaquina ('{$this->nombre}','{$this->fecha}','{$this->denominacion}','{$this->foto}')";
			$this->con->ConsultaSimple($sql);
			return true;
			}

		}
		public function actualizarmaquina(){
			$sql="CALL USP_IngresarActualizarMaquina ('{$this->nombre}','{$this->fecha}','{$this->denominacion}','{$this->foto}')";
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