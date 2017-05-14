
<?php
	@include_once("Clases/Maquinas.php");
	@include_once("../Clases/Maquinas.php");
	@include_once("../../Clases/Maquinas.php");
	
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
		public function indexfor() {
			$resultado = $this->Maquina->listarformato();
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
		public function actualizar($nombre,$fecha,$denominacion,$foto){
			$this->Maquina->set("nombre",$nombre);
			$this->Maquina->set("fecha",$fecha);
			$this->Maquina->set("denominacion",$denominacion);
			$this->Maquina->set("foto",$foto);
			$resultado = $this->Maquina->actualizarmaquina();
			return $resultado;
		}
		public function actualizarnombre($id,$nombre){
			$this->Maquina->set("id",$id);
			$this->Maquina->set("nombre",$nombre);
			$resultado = $this->Maquina->actualizarnombremaquina();
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
		public function crearfoto(){
		if(isset($_FILES['inputfotomaquina'])!=null){
		$ext = pathinfo($_FILES['inputfotomaquina']['name'],PATHINFO_EXTENSION);
		$ext = strtolower($ext);//convierte en minusculas
		if($ext!=""){
				if($ext == "jpg" || $ext == "png" ){
					if( $ext == "png" || $ext == "jpg"){
						$directorio = "../Imagenes/FotoMaquina/";
					}
					//$directorio.=$ext.'/';
					$archivo = $directorio.basename($_FILES['inputfotomaquina']['name']);
					/*if(!file_exists($directorio) && !is_dir($directorio)){
						mkdir($directorio,777,1);
					}*/
					if(file_exists($archivo)){
						//$archivo = str_replace(".".$ext, "", $archivo).date("Y_m_d_i_j_j_h_s").".".$ext;
					}
					if(move_uploaded_file($_FILES['inputfotomaquina']['tmp_name'],$archivo)){
						//$mensaje = "<label class='alert alert-success'>Archivo almacenado correctamente</label>";
					}
					}
				}
			}
			}
		public function eliminarfoto($archivo){
			if(file_exists("../Imagenes/FotoMaquina/".$archivo)){
				unlink("../Imagenes/FotoMaquina/".$archivo);
			}
		}
	}	
?>