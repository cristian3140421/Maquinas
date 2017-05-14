<?php
	@include_once("Clases/Usuarios.php");
	@include_once("../Clases/Usuarios.php");
	@include_once("../../Clases/Usuarios.php");
	
	class ControladorUsuario{
		//Atributos
		private $Usuario;

		//metodos
		public function __construct(){
			$this->Usuario = new Usuario();
		}
		public function index() {
			$resultado = $this->Usuario->listar();
			return $resultado;
		}
		public function indexrol() {
			$resultado = $this->Usuario->listarrol();
			return $resultado;
		}
		public function crear($nombre,$foto,$contrasena,$rol){
			$this->Usuario->set("nombre",$nombre);
			$this->Usuario->set("foto",$foto);
			$this->Usuario->set("contrasena",$contrasena);
			$this->Usuario->set("rol",$rol);	
			$resultado = $this->Usuario->crearactualizar();
			return $resultado;
		}
		public function actualizar($nombre,$foto,$contrasena,$rol){
			$this->Usuario->set("nombre",$nombre);
			$this->Usuario->set("foto",$foto);
			$this->Usuario->set("contrasena",$contrasena);
			$this->Usuario->set("rol",$rol);	
			$resultado = $this->Usuario->actualizarusuario();
			return $resultado;
		}
		public function actualizarnombre($id,$nombre){
			$this->Usuario->set("id",$id);
			$this->Usuario->set("nombre",$nombre);
			$resultado = $this->Usuario->actualizarnombremaquina();
			return $resultado;
		}
		public function eliminar($nombre){
			$this->Usuario->set("nombre",$nombre);
			$this->Usuario->eliminar();
		}

		public function ver($nombre){
			$this->Usuario->set("nombre",$nombre);
			$datos = $this->Usuario->Consultar();
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