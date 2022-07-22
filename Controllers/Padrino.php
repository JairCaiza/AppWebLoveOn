<?php 

	class Padrino extends Controllers{
		public function __construct()
		{
            session_start();
            if(empty($_SESSION['login'])){
                header('location:'.base_url().'/login');
            }
			parent::__construct();
		}

		public function padrino()
		{
			
		$data['page_tag'] = "Padrino";
        $data['page_title'] = "Panel de Padrinos";
        $data['page_name'] = "padrino";
        $data['page_functions_js'] = "functions_padrino.js";
        $this->views->getView($this, "padrino", $data);
		}

		public function getApadrinarse()
		{
			
		   //$intPersona = $_SESSION['userData']['idpersona'];
			$arrData = $this->model->selectNinos( );
			for ($i=0; $i < count($arrData); $i++) {
	
			   
				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-outline-success btn-sm btnEditNino" onClick=" fntApadrinar('.$arrData[$i]['idnin'].')" title="Apadrinar Niño"><i class="fas fa-edit"></i></button>
				
				</div>';
			}
			
		   // dep($arrData );
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getPadrino(int $idpersona){
			$idusuario = intval($idpersona);
			if($idusuario > 0)
			{
				$arrData = $this->model->selectNi($idusuario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setPadrino(){
			//dep($_POST);
			if($_POST){
				
				if(empty($_POST['idUsuario'])||empty($_POST['txtidpersona'])   )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$idUsuario = intval($_POST['idUsuario']);
					$idpersona = strClean($_POST['txtidpersona']);
					
						
						$request_user = $this->model->inserapadrinado($idUsuario,$idpersona);
					

					if($request_user > 0 )
					{
						$arrResponse = array('status' => true, 'msg' => 'El Niño se apadrino Correctamente.');
						
						
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible apadrinar el niño.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function getApadrinado()
    {
        
       $intPersona = $_SESSION['userData']['idpersona'];
        $arrData = $this->model->selectApadrinado($intPersona );
        for ($i=0; $i < count($arrData); $i++) {

           
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-info btn-sm btnReportNino"  onClick="btnReportNino('.$arrData[$i]['idapadrinado'].')"  title="Reportes"><i class="fas fa-eye"></i></button>
            <button class="btn btn-danger btn-sm btnDelNino" onClick="fntDelNino('.$arrData[$i]['idapadrinado'].')"  title="Eliminar Apadrinado"><i class="fas fa-trash"></i></button>
            </div>';
        }
        
       // dep($arrData );
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

	public function delApadrinado()
		{
			if($_POST){
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteNin($intIdpersona);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el apadrinado');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el apadrinado.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	}
