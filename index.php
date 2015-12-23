<?php
	require_once("config.php");
?>
<head>
	<title>Proyecto redes</title>
	<script src="js/jquery.js"></script>
	<script src="js/js.js"></script>
	<style type="text/css">

		div.modulo { border: 1px solid #aaaaaa; padding:10px; }
		iframe.ftp { width: 800px;}

	</style>
</head>


<div class="modulo">
	<h3>Modulo FTP</h3>

	<!-- Formulario para subir archivos -->
	<form enctype="multipart/form-data" id="ftp_form">
	    <input name="file" type="file" id="ftp_file"/>
	    <input type="button" value="Enviar" id="subir_ftp" onclick="uploadAjax();"/>
	</form>

	<p id="ftp_msg"></p>

	<!-- Mostrar los archivos -->
	<iframe class="ftp" id="iframe_ftp" src="ftp://<?php echo ftp_config::$server; ?>"></iframe>

</div>