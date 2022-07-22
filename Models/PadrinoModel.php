<?php 

	class PadrinoModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}


        public function selectNinos(){
			
			$sql = "SELECT idnin,pseudonimo FROM estudiante";
				$request = $this->select_all($sql);
			return $request;
		}
        public function selectNi(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idnin,pseudonimo
					FROM estudiante
					WHERE idnin = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}

        public function inserapadrinado(int $idnin,int $idpersona){
            $this->intidnin = $idnin;
			$this->intidpersona = $idpersona;
			$return = 0;

			$sql = "SELECT * FROM apadrinados WHERE 
					idnin = '{$this->intidnin}' ";
			$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO apadrinados(idnin,idpersona) 
								  VALUES(?,?)";
			$arrData = array(
				$this->intidnin,
				$this->intidpersona
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
	        return $return;
        }
		public function selectApadrinado(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT a.idapadrinado, a.idnin,e.pseudonimo
			FROM apadrinados a
            INNER JOIN estudiante e On a.idnin=e.idnin
            Where a.idpersona= $this->intIdUsuario";
				$request = $this->select_all($sql);
			return $request;
		}

		public function deleteNin(int $intIdnin)
		{
			$this->intIdnin = $intIdnin;
			$sql = "DELETE FROM apadrinados  WHERE idapadrinado = $this->intIdnin ";
			//$arrData = array(0);
			$request = $this->delete($sql);
			return $request;
		}
	

		
	}
 ?>