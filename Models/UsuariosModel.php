<?php 

	class UsuariosModel extends Mysql
	{
		private $intIdUsuario;
		private $strCedula;
		private $strNombre;
		private $strApellido;
		private $intTelefono;
		private $strEmail;
		private $strPassword;
		private $strToken;
		private $intTipoId;
		private $intStatus;

		public function __construct()
		{
			parent::__construct();
		}	

		public function insertUsuario(string $identificacion, string $nombre, string $apellido, 
        int $telefono, string $email, string $password, int $tipoid, int $status){

			$this->strCedula = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM persona WHERE 
					email = '{$this->strEmail}' or cedula = '{$this->strCedula}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO persona(cedula,nombres,apellidos,telefono,email,password,idrol,estado) 
								  VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strCedula,
        						$this->strNombre,
        						$this->strApellido,
        						$this->intTelefono,
        						$this->strEmail,
        						$this->strPassword,
        						$this->intTipoId,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectUsuarios()
		{
			$sql = "SELECT p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email,p.estado,r.nombrerol 
					FROM persona p 
					INNER JOIN rol r
					ON p.idrol = r.idrol
					WHERE p.estado != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}
		public function selectUsuario(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT p.idpersona,p.cedula,p.nombres,p.apellidos,p.telefono,p.email,r.idrol,r.nombrerol,p.estado, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro 
					FROM persona p
					INNER JOIN rol r
					ON p.idrol = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}

		public function updateUsuario(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoid, int $status){

			$this->intIdUsuario = $idUsuario;
			$this->strCedula = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;

			$sql = "SELECT * FROM persona WHERE (email = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)
										  OR (cedula = '{$this->strCedula}' AND idpersona != $this->intIdUsuario) ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?, email=?, password=?, idrol=?, estado=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strCedula,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->strPassword,
	        						$this->intTipoId,
	        						$this->intStatus);
				}else{
					$sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?, email=?, idrol=?, estado=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strCedula,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->intTipoId,
	        						$this->intStatus);
				}
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}
		public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE persona SET estado = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function updatePerfil(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono, string $password){
			$this->intIdUsuario = $idUsuario;
			$this->strCedula = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strPassword = $password;

			if($this->strPassword  != "")
				{
					$sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?, password=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strCedula,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strPassword);
				}else{
					$sql = "UPDATE persona SET cedula=?, nombres=?, apellidos=?, telefono=?
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strCedula,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono);
				}
				$request = $this->update($sql,$arrData);
				return $request;
		}

	}
 ?>