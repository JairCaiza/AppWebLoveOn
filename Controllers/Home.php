<?php 

	class Home extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Home";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['page_functions_js'] = "functions_home.js";
			$this->views->getView($this,"home",$data);

			
		}

		public function setMensajes(){
			//dep($_POST);
		
			if($_POST){
				
				if(empty($_POST['txtnombres']) || empty($_POST['txtemail']) || empty($_POST['txttelefono']) || empty($_POST['txtmensaje'])  )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					//$idsms = intval($_POST['idsms']);
					$strNombres= strClean($_POST['txtnombres']);
					$strEmail = strtolower(strClean($_POST['txtemail']));
					$strTelefono = strtolower(strClean($_POST['txttelefono']));
					$strMensajes = strtolower(strClean($_POST['txtmensaje']));
						$request_user = $this->model->insertMensaje($strNombres,
																			$strEmail, 
																			$strTelefono, 
																			$strMensajes);
					

					if($request_user > 0 )
					{
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						
					}else {
						
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function ContarNiños(){
			
			$arrData = $this->model->Contarestudiantes();
			//dep($arrData);
			echo $arrData;
			for ($i = 0; $i < count($arrData); $i++) {


				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-danger btn-sm btnDelSms" onClick="fntDelSms()"  title="Eliminar Mensaje"><i class="fas fa-trash"></i></button>
				</div>';
			}

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		
			die();
		}

	

	}
 ?>