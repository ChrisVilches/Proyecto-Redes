<?php

	require_once("config.php");

	if(isset($_FILES) && sizeof($_FILES) == 0){		
		die();
	}

	$ftp_connection = ftp_connect(ftp_config::$server, ftp_config::$port);
	$ftp_login = ftp_login($ftp_connection, ftp_config::$username, ftp_config::$password);


	if (!$ftp_connection || !$ftp_login) { 
	    echo "FTP connection has failed!";
	    echo "Attempted to connect"; 
	    exit; 
	}

	var_dump($_FILES);


	$source_file = $_FILES["filename"]["tmp_name"];
	$filename = $_FILES["filename"]["name"]; 
	$upload = ftp_put($ftp_connection, $filename, $source_file, FTP_BINARY);

	ftp_close($ftp_connection); 

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$txt = "John Doea kakakakaka\n";
	fwrite($myfile, $txt);
	$txt = "Jane Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);

?>