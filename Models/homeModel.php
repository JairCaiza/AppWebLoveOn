<?php 

	class homeModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		public function insertMensaje(string $nombres, string $email, string $telefono, 
        string $mensajes){
			$this->strNombres = $nombres;
			$this->strEmail = $email;
			$this->strTelefono = $telefono;
			$this->strMensajes = $mensajes;

			$query_insert  = "INSERT INTO contacto(nombres,email,telefono,mensaje) 
								  VALUES(?,?,?,?)";
	        	$arrData = array($this->strNombres,
        						$this->strEmail,
        						$this->strTelefono,
        						$this->strMensajes);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
				return $return;
		
		}

		public function Contarestudiantes(){
			
			$sql = "SELECT count(*) AS estudiantes FROM estudiante";
				$request = $this->Contarregistro($sql);
			return $request;
		}

		
	}


	
 ?>