<?php 

	class RepresentanteModel extends Mysql
	{ 
		private $intIdnin;	
		private $strCedula;
	private $strNombre;
	private $strApellido;
	private $strFechaNac;
	private $strDireccion;
	private $strEmail;
	private $strInsEdu;
	private $strJornada;
	private $strCurso;
	private $strOng;
	private $strAlergias;
	private $strEnfermedad;
	private $intIdRepresentante;

		public function __construct()
		{
			parent::__construct();
		}	

		public function insertNino(string $cedula, string $nombre, string $apellido, 
        string $fechanac,string $direccion, string $email, string $insedu,string $jornada, string $curso,
		string $ong,string $alergias,string $enfermedad, int $idpersona,string $pseudonimo){

			$this->strCedula = $cedula;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strFechaNac = $fechanac;
			$this->strDireccion = $direccion;
			$this->strEmail = $email;
			$this->strInsEdu=$insedu;
			$this->strJornada=$jornada;
			$this->strCurso=$curso;
			$this->strOng=$ong;
			$this->strAlergias=$alergias;
			$this->strEnfermedad=$enfermedad;			
			$this->intIdRepresentante=$idpersona;
			$this->strPseudonimo=$pseudonimo;
			$return = 0;

			$sql = "SELECT * FROM estudiante WHERE 
					email = '{$this->strEmail}' or cedula = '{$this->strCedula}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO estudiante(cedula,nombres,apellidos,fechanacimiento,direccion,email,institucionedu,jornada,curso,ong,alergias,enfermedad,idpersona,pseudonimo) 
								  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strCedula,
        						$this->strNombre,
        						$this->strApellido,
        						$this->strFechaNac,
								$this->strDireccion,
        						$this->strEmail,
								$this->strInsEdu,
								$this->strJornada,
								$this->strCurso,
								$this->strOng,
								$this->strAlergias,
								$this->strEnfermedad,
								$this->intIdRepresentante,
								$this->strPseudonimo
        						);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectNinos(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idnin,cedula,nombres,apellidos,fechanacimiento,direccion,email,institucionedu,jornada,curso,ong,alergias,enfermedad 
			FROM estudiante WHERE idpersona = $this->intIdUsuario";
				$request = $this->select_all($sql);
			return $request;
		}

		public function selectNino(int $idnin){
			$this->intIdnin = $idnin;
			$sql = "SELECT idnin,cedula,nombres,apellidos,DATE_FORMAT(fechanacimiento, '%d/%m/%Y') ,direccion,email,institucionedu,jornada,curso,ong,alergias,enfermedad,pseudonimo
			FROM estudiante WHERE idnin = $this->intIdnin";
				
			$request = $this->select($sql);
			return $request;
		}

		public function updateNino(int $idnin,string $strCedula,string $strNombre,string $strApellido, string $intFechaNac,
		string $strDireccion,string $strEmail,string $strInsEdu,string $strJornada,string $strCurso,string $strong,string $strAlergias,string $strEnfermedad,int $intIdRepresentante, string $p){

			$this->intIdnin = $idnin;
			$this->strCedula = $strCedula;
			$this->strNombre = $strNombre;
			$this->strApellido = $strApellido;
			$this->strFechaNac = $intFechaNac;
			$this->strDireccion = $strDireccion;
			$this->strEmail = $strEmail;
			$this->strInsEdu = $strInsEdu;
			$this->strJornada = $strJornada;
			$this->strCurso = $strCurso;
			$this->strOng = $strong;
			$this->strAlergias = $strAlergias;
			$this->strEnfermedad = $strEnfermedad;
			$this->intIdRepresentante=$intIdRepresentante;
			$this->strPseudonimo = $p;

			$sql = "SELECT * FROM estudiante WHERE (email = '{$this->strEmail}' AND idnin != $this->intIdnin)
										  OR (cedula = '{$this->strCedula}' AND idnin != $this->intIdnin) ";
			$request = $this->select_all($sql);
			//dep($request);
			if(empty($request))
			{
					
					$sql = "UPDATE estudiante SET cedula=?, nombres=?, apellidos=?,fechanacimineto=?,direccion, email=?,
					 institucionedu=?, jornada=? ,curso=?,ong=?,alergias=?,enfermedad=?,pseudonimo=?
							WHERE idnin = $this->intIdnin ";
					$arrData = array(
						$this->strCedula,
						$this->strNombre,
						$this->strApellido,
						$this->strFechaNac,
						$this->strDireccion,
						$this->strEmail,
						$this->strInsEdu,
						$this->strJornada,
						$this->strCurso,
						$this->strOng,
						$this->strAlergias,
						$this->strEnfermedad,
						$this->strPseudonimo
						);
				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}



		public function deleteNino(int $intIdnin)
		{
			$this->intIdnin = $intIdnin;
			$sql = "DELETE FROM estudiante  WHERE idnin = $this->intIdnin ";
			//$arrData = array(0);
			$request = $this->delete($sql);
			return $request;
		}
	}
 ?>