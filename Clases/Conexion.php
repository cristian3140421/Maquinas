<?php
	class Conexion{
		//Atributos
		private $host = "localhost";
		private $user = "root";
		private $contrasena = "";
		private $db = "Rivera";
		private	$conex = mysqli_connect($this->host, $this->user, $this->pass,$this->db);
		//Metodos
		public function __construct(){

			$con = mysqli_connect($this->host, $this->user, $this->pass);
			if($con)
				mysqli_select_db($con,$this->db);
		}
		//consulta simple
		public function ConsultaSimple($sql){
			$consulta = mysqli_query($conex,$sql);
		}
		//consulta con retorno
		public function ConsultaRetorno($sql){
			$consulta = mysqli_query($conex,$sql);
			return $consulta;
		}
		
	}
?>