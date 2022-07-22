<?php 
	
	//define("BASE_URL", "http://localhost/AppWebLoveOn/");
	const BASE_URL = "http://localhost/AppWebLoveOn";

	//Zona horaria
	date_default_timezone_set('America/Guatemala');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "db_loveon";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "charset=utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "Q";

	const NOMBRE_REMITENTE="JlSoftware";
	const EMAIL_REMITENTE="no-replay@jlsoftware.com";
	const NOMBRE_EMPESA="JlSoftware";
	const WEB_EMPRESA="www.jlsoftware.com";

 ?>