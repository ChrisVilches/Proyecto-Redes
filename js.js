// Funcion para subir usando Ajax, a una pagina PHP, para asi subirlo a FTP.
function uploadAjax(){

	var inputFileImage = $("#ftp_file").get(0);

	var file = inputFileImage.files[0];

	var data = new FormData();

	var url = "ftp_ajax.php";

	data.append("filename",file);	

	$.ajax({

		url:url,
		type:"POST",
		contentType:false,
		data:data,
		processData:false,
		cache:false,

		// Cuando el archivo se sube exitosamente
		success: function(response){
	    	$('#iframe_ftp').attr("src", $('#iframe_ftp').attr("src"));
	    	$("#ftp_form")[0].reset();
	    	$("#ftp_msg").html("<b>"+file.name + "</b> se ha subido correctamente.");
	    },

	    // Cuando hay un error
	    error: function(response){
	    	$("#ftp_msg").html("Hubo un error al subir archivo <b>"+file.name + "</b>.");
	    }
	});
}