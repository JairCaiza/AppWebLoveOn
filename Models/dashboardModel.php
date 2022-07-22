<?php 

	class DashboardModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}


        public function selectNinos(){
			
			$sql = "SELECT idnin,cedula,nombres,apellidos,direccion,email,institucionedu,jornada,curso,ong,alergias,enfermedad 
			FROM estudiante";
				$request = $this->select_all($sql);
			return $request;
		}
		public function selectMensajes(){
			
			$sql = "SELECT idsms,nombres,email,telefono,mensaje,fecha 
			FROM contacto";
				$request = $this->select_all($sql);
			return $request;
		}

		public function deleteMensaje(int $intIdSms)
		{
			$this->intIdsms = $intIdSms;
			$sql = "DELETE FROM contacto  WHERE idsms = $this->intIdsms ";
			//$arrData = array(0);
			$request = $this->delete($sql);
			return $request;
		}
		public function insertarNoticia(string $nombren, string $portada)
	{

		$return = "";
			$this->strnombre = $nombren;
			$this->strportada = $portada;

			$sql = "SELECT * FROM noticias WHERE nombre = '{$this->strnombre}' ";
			$request = $this->select_all($sql);

			if($request==null)
			{
				$query_insert  = "INSERT INTO noticias(nombre,archivo) VALUES(?,?)";
	        	$arrData = array($this->strnombre, $this->strDestrportadascripcion);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = 0;
			}
			return $return;
	}

		
	}
 ?>