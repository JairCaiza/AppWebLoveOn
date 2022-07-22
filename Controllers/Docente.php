

<?php 

	class Docente extends Controllers{
		public function __construct()
		{
            session_start();
            if(empty($_SESSION['login'])){
                header('location:'.base_url().'/login');
            }
			parent::__construct();
		}

		public function docente()
		{
			
		$data['page_tag'] = "Docente";
        $data['page_title'] = "Panel de Docente";
        $data['page_name'] = "docente";
        $data['page_functions_js'] = "functions_docente.js";
        $this->views->getView($this, "docente", $data);
		}


		public function setNota(){
			dep($_POST);
			die();
		}

	}
 ?>