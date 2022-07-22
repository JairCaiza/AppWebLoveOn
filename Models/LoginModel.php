<?php 

	class LoginModel extends Mysql
	{

        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;
		public function __construct()
		{
			parent::__construct();
		}	

        public function loginUser(string $usuario,string $password){
            $this->strUsuario=$usuario;
           $this->strPassword=$password;

          $sql="SELECT idpersona,estado FROM persona WHERE
                    email='$this->strUsuario' and
                    password='$this->strPassword' and
                    estado !=0";

                    $request=$this->select($sql);
                    return $request;
                    
        }

        public function sessionLogin(int $iduser){
            $this->intIdUsuario=$iduser;

            $sql="SELECT p.idpersona,
            p.cedula,
            p.nombres,
            p.apellidos,
            p.telefono,
            p.email,
            r.idrol,r.nombrerol,
            p.estado,
            p.lugartrabajo,
            p.telefonotrabajo,
            p.direccion,
            p.estadocivil,
            p.profesion
             FROM persona p
            INNER JOIN rol r ON p.idrol=r.idrol
            WHERE p.idpersona=$this->intIdUsuario";
            $request=$this->select( $sql);
            $_SESSION['userData']=$request;
            return $request;
        }

        public function getUserEmail(string $strEmail){
            $this->strUsuario=$strEmail;

            $sql="SELECT idpersona,nombres,apellidos,estado
             FROM persona      
            WHERE email='$this->strUsuario' and estado=1";
            $request=$this->select( $sql);
            return $request;
        }

        public function setTokenUser(int $idpersona,string $token){
            $this->intIdUsuario=$idpersona;
            $this->strToken=$token;

            $sql=" UPDATE persona SET token= ? WHERE idpersona= $this->intIdUsuario";

            $arrData=array($this->strToken);
            $request=$this->update( $sql,$arrData);
            return $request;


        }

        public function getUsuario(string $email,string $token){
            $this->strUsuario=$email;
            $this->strToken=$token;

            $sql="SELECT idpersona
             FROM persona      
            WHERE email='$this->strUsuario' and token='$this->strToken' and estados=1";
            $request=$this->select( $sql);
            return $request;
        }

        public function insertPassword(string $idpersona,string $password){
            $this->intIdUsuario=$idpersona;
            $this->strPassword=$password;

            $sql="UPDATE persona SET password =?, token=?  WHERE idpersona=$this->intIdUsuario "  ;    
           
            $arrData=array($this->strPassword,"");
            $request=$this->update( $sql,$arrData);
            return  $request;
        }

	}
 ?>