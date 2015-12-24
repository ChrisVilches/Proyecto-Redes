<?php
	require_once("config.php");
?>
<html>
	<head>
		<title>Proyecto redes</title>
		<script src="js/jquery.js"></script>
		<script src="js/main.js"></script>
		<style type="text/css">

			div.modulo { border: 1px solid #aaaaaa; padding:10px; margin-top: 10px; }
			p.ntp_hora { font-size: 20px; }
			p.ntp_fecha { font-size: 12px; }
			textarea.mailcontent{ width:100%; height: 100px; }
			tr{vertical-align: top;}
			span {min-height: 10px;}

		</style>
	</head>
	<body>

		<div class="modulo">
			<h3>Modulo FTP</h3>

			<!-- Formulario para subir archivos -->
			<form enctype="multipart/form-data" id="ftp_form">
			    <input name="file" type="file" id="ftp_file"/>
			    <input type="button" value="Enviar" id="subir_ftp" onclick="FTP.uploadAjax();"/>
			</form>

			<p id="ftp_msg"></p>

			<!-- Mostrar los archivos -->
			<div id="archivos_ftp"></div>

		</div>

		<div class="modulo">
			<h3>Modulo NTP</h3>
			<div id="ntp_result"></div>
			<span id="ntp_msg">Cargando...</span>
		</div>

		<div class="modulo">
			<h3>Modulo SMTP</h3>
			<form id="smtp_form" method="post" action="ajax/smtp_ajax.php">
				<table>
					<tr><td>Desde:</td><td><input type="text" name="from"/></td></tr>
					<tr><td>Destino:</td><td><input type="text" name="destino"/></td></tr>
					<tr><td>Asunto:</td><td><input type="text" name="subject"/></td></tr>
					<tr><td>Contenido:</td><td><textarea class="mailcontent" name="content"></textarea></td></tr>
					
					<tr><td><input type="submit" value="Enviar"></td><td></td></tr>
				</table>
			</form>
			<span id="smtp_msg"></span>

		</div>
	</body>
</html>