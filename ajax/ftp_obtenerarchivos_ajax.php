<?php

	require_once("../config.php");

	$ftp_connection = @ftp_connect(ftp_config::$server, ftp_config::$port) or die("Error connect FTP");
	$ftp_login = @ftp_login($ftp_connection, ftp_config::$username, ftp_config::$password) or die("Error login FTP");

	$contents = @ftp_nlist($ftp_connection, '/') or die("Error: No se pueden listar los archivos");

	echo "<ul>";
	    for ($i = 0 ; $i < count($contents) ; $i++){
	    	echo "<li>" . substr($contents[$i],1) . "</li>";
	    }
	echo "</ul>";

	ftp_close($ftp_connection); 

?>