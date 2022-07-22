<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
 			session_start();
        if(empty($_SESSION['login'])){
            header('location:'.base_url().'/login');
        }
			getPermisos(1);
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = "Dashboard - Love On";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			
			$this->views->getView($this,"dashboard",$data);
		}
	public function getNinos()
	{
		$arrData = $this->model->selectNinos();
		$totalninos=count($arrData);
		//dep($totalninos );
		for ($i = 0; $i < count($arrData); $i++) {


			$arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-primary btn-sm btnReportNino"  onClick="btnReportNino(' . $arrData[$i]['idnin'] . ')"  title="Ver Reportes"><i class="fas fa-eye"></i></button>
            <button class="btn btn-warning  btn-sm btnEditNino" onClick=" fntEditNino(' . $arrData[$i]['idnin'] . ')" title="Editar Niño"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger btn-sm btnDelNino" onClick="fntDelNino(' . $arrData[$i]['idnin'] . ')"  title="Eliminar Niño"><i class="fas fa-trash"></i></button>
            </div>';
		}

		// dep($arrData );
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function getMensajes()
	{
		$arrData = $this->model->selectMensajes();
		$totalninos=count($arrData);
		//dep($totalninos );
		for ($i = 0; $i < count($arrData); $i++) {


			$arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-danger btn-sm btnDelSms" onClick="fntDelSms(' . $arrData[$i]['idsms'] . ')"  title="Eliminar Mensaje"><i class="fas fa-trash"></i></button>
            </div>';
		}

		// dep($arrData );
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}
	public function delMensaje()
		{
			if($_POST){
				$intIdsms = intval($_POST['idSms']);
				$requestDelete = $this->model->deleteMensaje($intIdsms);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Mensaje');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Mensaje.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setNoticias(){
			

			//dep($_POST);
			//dep($_FILES);
			if($_POST){
				
				if(empty($_POST['txtNombreN']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Llene los datos en los campos');
				}else{ 
					$idNoticia = intval($_POST['Idnoticia']);
					$NombreN = strClean($_POST['txtNombreN']);


					$foto=$_FILES['foto'];
					
					$nombrefoto=$foto['name'];
					$type=$foto['type'];
					$url_temp=$foto['tmp_name'];
					$imgportada='img_portada.jpg';

					if($nombrefoto != ''){

						$imgportada='img'.md5(date('d-m-Y H:m:s')).'jpg';
					}

					
						
						$request_user = $this->model->insertarNoticia($NombreN,$imgportada);
					

					if($request_user > 0 )
					{
						$arrResponse = array('status' => true, 'msg' => 'EL archivo se guardo correctamente.');
						if($nombrefoto != ''){

							upLoadImage($foto,$imgportada);
						}
						
						
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible guardar el archivo.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();

			
		
			
			//dep($_POST	);

			
		}


	}
