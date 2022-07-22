<?php
class Logout{

    public function __construct()
    {
        session_start();
        session_unset();//limpia a todas las variables de session
        session_destroy();
        header('location:'.base_url());
    }

    
}


?>