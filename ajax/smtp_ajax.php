<?php

	require_once("../phpmailer/PHPMailerAutoload.php");
	require_once("../config.php");

	$mail = new PHPMailer();

	// Indicar que usa SMTP
	$mail->IsSMTP();

	// Colocar el nombre de servidor
	if(smtp_config::$port != ""){
		$mail->Host     = smtp_config::$server . ":" . smtp_config::$port; // SMTP server
	} else {
		$mail->Host     = smtp_config::$server; // SMTP server
	}	

	// Informacion del correo
	$mail->From     = $_POST["from"];
	$mail->AddAddress($_POST["destino"]);

	$mail->Subject  = $_POST["subject"];
	$mail->Body     = $_POST["content"];
	$mail->WordWrap = smtp_config::$word_wrap;

	// Enviar el correo y ver si funciono o no
	if(!$mail->Send()) {
	  echo "Mailer error: " . $mail->ErrorInfo;
	} else {
	  echo "1";
	}

?>