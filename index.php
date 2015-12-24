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
			iframe.ftp { width: 800px; }
			p.ntp_hora { font-size: 20px; }
			p.ntp_fecha { font-size: 12px; }

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
			<iframe class="ftp" id="iframe_ftp" src="ftp://<?php echo ftp_config::$server; ?>"></iframe>

		</div>

		<div class="modulo">
			<h3>Modulo NTP</h3>
			<div id="ntp_result"></div>
			<span id="ntp_msg">Cargando...</span>
		</div>
	</body>
</html>