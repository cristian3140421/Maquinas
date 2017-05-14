<?php
	class Conexion{
		//Atributos
		private $host = "localhost";
		private $user = "root";
		private $contrasena = "";
		private $db = "riviera";
		
		//Metodos
		public function __construct(){

			$con = mysqli_connect($this->host, $this->user, $this->contrasena);
			if($con)
				mysqli_select_db($con,$this->db);
		}
		//consulta simple
		public function ConsultaSimple($sql){
			$conex = mysqli_connect($this->host, $this->user, $this->contrasena,$this->db);
			$consulta = mysqli_query($conex,$sql);
		}
		//consulta con retorno
		public function ConsultaRetorno($sql){
			$conex = mysqli_connect($this->host, $this->user, $this->contrasena,$this->db);
			$consulta = mysqli_query($conex,$sql);
			return $consulta;
		}
		
	}
?>