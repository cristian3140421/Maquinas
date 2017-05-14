
<?php
	@include_once("Clases/Maquinas.php");
	@include_once("../Clases/Maquinas.php");
	
	class ControladorMaquina{
		//Atributos
		private $Maquina;

		//metodos
		public function __construct(){
			$this->Maquina = new Maquina();
		}
		public function index() {
			$resultado = $this->Maquina->listar();
			return $resultado;
		}
		public function crear($nombre,$fecha,$denominacion,$foto){
			$this->Maquina->set("nombre",$nombre);
			$this->Maquina->set("fecha",$fecha);
			$this->Maquina->set("denominacion",$denominacion);
			$this->Maquina->set("foto",$foto);
			$resultado = $this->Maquina->crearactualizar();
			return $resultado;
		}
		public function eliminar($nombre){
			$this->Maquina->set("nombre",$nombre);
			$this->Maquina->eliminar();
		}

		public function ver($nombre){
			$this->Maquina->set("nombre",$nombre);
			$datos = $this->Maquina->Consultar();
			return $datos;
		}
	}	
?>