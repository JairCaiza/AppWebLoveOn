<?php
class Representante extends Controllers
{
    public function __construct()
		{	
            session_start();
		/*	if(isset($_SESSION['login'])){
				header('location:'.base_url().'/login');
			}*/
			parent::__construct();
		}


    public function representante()
    {
        $data['page_tag'] = "Representante";
        $data['page_title'] = "Pagina principal de Representante";
        $data['page_name'] = "representante";
        $data['page_functions_js'] = "functions_representante.js";
        $this->views->getView($this, "representante", $data);
    }

    public function getNinos()
    {
        
       $intPersona = $_SESSION['userData']['idpersona'];
        $arrData = $this->model->selectNinos($intPersona );
        for ($i=0; $i < count($arrData); $i++) {

           
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-primary btn-sm btnReportNino"  onClick="btnReportNino('.$arrData[$i]['idnin'].')"  title="Ver Reportes"><i class="fas fa-eye"></i></button>
            <button class="btn btn-warning  btn-sm btnEditNino" onClick=" fntEditNino('.$arrData[$i]['idnin'].')" title="Editar Niño"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger btn-sm btnDelNino" onClick="fntDelNino('.$arrData[$i]['idnin'].')"  title="Eliminar Niño"><i class="fas fa-trash"></i></button>
            </div>';
        }
        
       // dep($arrData );
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setNino(){
        //dep($_POST);
        
        if($_POST){
            
            if(empty($_POST['txtCedula']) || empty($_POST['txtNombre']) 
            || empty($_POST['txtApellido']) || empty($_POST['txtFechaNacimiento']) 
            || empty($_POST['txtDireccion']) || empty($_POST['txtEmail']) 
            || empty($_POST['txtInsEdu']) || empty($_POST['txtJornada']) 
            || empty($_POST['txtCurso'])|| empty($_POST['txtong'])
            || empty($_POST['txtalergias']) ||empty($_POST['txtenfermedad']) ||empty($_POST['txtPseudonimo']))
            {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{ 

                $idnin = intval($_POST['idnin']);

                $strCedula = strClean($_POST['txtCedula']);
                $strNombre = ucwords(strClean($_POST['txtNombre']));
                $strApellido = ucwords(strClean($_POST['txtApellido']));
                $intFechaNac = ucwords(strClean($_POST['txtFechaNacimiento']));
                $strDireccion = ucwords(strClean($_POST['txtDireccion']));
                $strEmail =strtolower(strClean($_POST['txtEmail']));
                $strInsEdu = ucwords(strClean($_POST['txtInsEdu']));
                $strJornada = ucwords(strClean($_POST['txtJornada']));
                $strCurso = ucwords(strClean($_POST['txtCurso']));
                $strong = ucwords(strClean($_POST['txtong']));
                $strAlergias = ucwords(strClean($_POST['txtalergias']));
                $strEnfermedad = ucwords(strClean($_POST['txtenfermedad']));
                $intIdRepresentante = $_POST['txtidpersona'];
                $strPseudonimo = ucwords(strClean($_POST['txtPseudonimo']));

                //dep($idnin);

                if($idnin == 0)
                {
                    $option = 1;
                    $request_user = $this->model->insertNino($strCedula,$strNombre,$strApellido, 
                    $intFechaNac,$strDireccion,$strEmail,$strInsEdu,$strJornada,$strCurso,$strong,
                    $strAlergias,$strEnfermedad,$intIdRepresentante,$strPseudonimo);
                }else{
                    $option = 2;
                   
                    $request_user = $this->model->updateNino($idnin,$strCedula,$strNombre,$strApellido, 
                    $intFechaNac,$strDireccion,$strEmail,$strInsEdu,$strJornada,$strCurso,$strong,
                    $strAlergias,$strEnfermedad,$intIdRepresentante,$strPseudonimo );
                    dep($request_user);
                }
                if($request_user > 0 )
                {
                   // $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.'); 
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                    }

                }else if($request_user == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }


    public function getNino(int $idnin){
			
        $idnin = intval($idnin);
        if($idnin > 0)
        {
            $arrData = $this->model->selectNino( $idnin);
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


    public function delNino()
    {
       // dep($$_POST);
        if($_POST){
            //dep($$_POST);
            $intIdnin = intval($_POST['idnin']);
            //dep($intIdnin);
            $requestDelete = $this->model->deleteNino($intIdnin);
            if($requestDelete)
            {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el niño');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el niño.');
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
