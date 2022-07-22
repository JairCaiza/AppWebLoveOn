<?php 

	class Login extends Controllers{
		public function __construct()
		{ parent::__construct();
			session_start();
			/*if(isset($_SESSION['login'])){
				header('location:'.base_url().'/login');
			}*/
			
		}

		public function login()
		{
			
			$data['page_tag'] = "Login";
			$data['page_title'] = "Login";
			$data['page_name'] = "login";
			$data['page_functions_js'] = "functions_login.js";
			$this->views->getView($this,"login",$data);
		}
        
		public function loginUser(){

			//dep($_POST);
			if($_POST){
				if(empty($_POST['txtEmail'])|| empty($_POST['txtPassword'])){

					$arrResponse=array('status'=>false, 'msg'=>'Error de datos');
				}else{

					$strUsuario= strtolower(strClean($_POST['txtEmail']));
					$strPassword= hash("SHA256",$_POST['txtPassword']);
					$requestUser=$this->model->loginUser($strUsuario,$strPassword);

					if(empty($requestUser)){
						$arrResponse= array('status'=>false, 'msg'=>'El usuario y la contraseña es incorrecta');	
					}else{

						$arrData=$requestUser;

						if ($arrData['estado']==1) {
							$_SESSION['idUser']=$arrData['idpersona'];
							$_SESSION['login']=true;
							
							$arrData=$this->model->sessionLogin($_SESSION['idUser']);
							sessionUser($_SESSION['idUser']);
							//$_SESSION['userData']=$arrData;
								//dep($_SESSION['userData']);

							$arrResponse=array('status'=>true, 'msg'=>'ok');
						} else {
							$arrResponse=array('status'=>false, 'msg'=>'Usuario Incorrecto');
						}
						
					}

					//dep($requestUser);
				}
				
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			
			die();
		}

		public function resetPass(){
			if($_POST){
				error_reporting(0);
				if(empty($_POST['txtEmailReset'])){

					$arrResponse=array('status'=>false, 'msg'=>'Error de email');
				}else{
					$token=token();
					$strEmail= strtolower(strClean($_POST['txtEmailReset']));
					$arrData=$this->model->getUserEmail($strEmail);

					if (empty($arrData)) {
						$arrResponse=array('status'=>false, 'msg'=>'Usuario no Encontrado');
					} else {
						$idpersona=$arrData['idpersona'];
						$nombreUsuario=$arrData['nombres'].''.$arrData['apellidos'];

						$url_recovery=base_url().'/login/confirmUser'.$strEmail.'/'.$token;
						$requestUpdate=$this->model->setTokenUser($idpersona,$token);
						
						$dataUsuario=array('nombreUsuario'=>$nombreUsuario,
											'email'=>$strEmail,
											'asunto'=>'Recuperar Cuenta -'.NOMBRE_REMITENTE,
											'url_recovery'=>$url_recovery);
											

						
						

						if ($requestUpdate) {
							$sendEmail=sendEmail($dataUsuario,'email_cambioPassword');
							if($sendEmail){
								$arrResponse=array('status'=>true, 'msg'=>'Se ha enviado un email a tu correo revise por favor');
							}else{
								$arrResponse=array('status'=>false, 'msg'=>'No es posible cambiar la contraseña, intente mas tarde');
							}
							
						} else {
							# code...
							$arrResponse=array('status'=>false, 'msg'=>'No es posible cambiar la contraseña, intente mas tarde');
						}
						
					}
					
					
				}
				sleep(1);
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function confirmUser(string $params){

			if (empty($params)) {
				header('location:'.base_url().'/login');
			} else {
				$arrParams=explode(',',$params);
				$strEmail=strClean($arrParams[0]);
				$srtToken=strClean($arrParams[1]);
				$arrResponse=$this->model->getUsuario($strEmail,$srtToken);

				if (empty($arrResponse)) {
				header('location:'.base_url().'/login');
				}else{
					$data['page_tag'] = "Cambiar contraseña";
					$data['page_name'] = "cambiar_contraseña";
					$data['email'] = $strEmail;
					$data['token'] = $srtToken;
					$data['page_title'] = "Cambiar contraseña";
					$data['idpersona'] = $arrResponse['idpersona'];
					$this->views->getView($this,"cambiar_password",$data);
				}
			}

			die();
			

			
		}

		public function setPassword(){
			
				if(empty($_POST['idUsuario']) || empty($_POST['txtEmail'])||empty($_POST['txtToken'])||
				empty($_POST['txtPassword']) || 
				empty($_POST['txtPasswordConfirm'])){

					$arrResponse=array('status'=>false, 'msg'=>'Error de email');
				}else{
					$intIdpersona=intval($_POST['idUsuario']);
					$strEmail=$_POST['txtEmail'];
					$srtToken=$_POST['txtToken'];
					$strPassword=$_POST['txtPassword'];
					$strConfirmPass=$_POST['txtPasswordConfirm'];

					if ($strPassword !=$strConfirmPass) {
						$arrResponse=array('status'=>false, 'msg'=>'Las contraceñas no coinciden');
					} else {
						$arrResponseUser=$this->model->getUsuario($strEmail,$srtToken);

						if (empty($arrResponseUser)) {
							$arrResponse=array('status'=>false, 'msg'=>'Error de datos');
						}else{
							$strPassword=hash("SHA256",$strPassword);
							$requestPassword=$this->model->insertPassword($intIdpersona,$strPassword);

							if (empty($requestPassword)) {
								$arrResponse=array('status'=>true, 'msg'=>'Contraseña actualizada con exito');
							}else{
								$arrResponse=array('status'=>false, 'msg'=>'No se pudo actualizar, intente mas tarde');
							}
						}
					}
					
					
					
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		
			die();
		}

	}
 ?>