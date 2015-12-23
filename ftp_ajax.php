<?php

	require_once("config.php");

	// Si no se pasaron archivos, dejar de ejecutar
	if(isset($_FILES) && sizeof($_FILES) == 0){		
		exit;
	}

	// Conectarse al servidor
	$ftp_connection = ftp_connect(ftp_config::$server, ftp_config::$port);
	$ftp_login = ftp_login($ftp_connection, ftp_config::$username, ftp_config::$password);

	// Validar conexion o login
	if (!$ftp_connection || !$ftp_login) { 
	    exit; 
	}

	// Realizar la subida de archivo
	$source_file = $_FILES["filename"]["tmp_name"];
	$filename = $_FILES["filename"]["name"]; 
	$upload = ftp_put($ftp_connection, $filename, $source_file, FTP_BINARY);

	ftp_close($ftp_connection); 

?>