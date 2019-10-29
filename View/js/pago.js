
$(document).ready(function(){
	
	$("#btnExecInsert").click(function(){

		var fechaUso=$("#fechaUso").val();
		var nombreUsuario=$("#Nombre").val();
		var apellidoUsuario=$("#Apellido").val();
		var numTel=$("#numTel").val();
		var dni=$("#dni").val();
		var precioTotal=$("#precioTotal").val();
	     
	  	$.ajax({
	       	type: "GET",
	       	data:{'fechaUso':fechaUso, 'nombreUsuario':nombreUsuario, 'apellidoUsuario':apellidoUsuario, 'numTel':numTel, 'dni':dni, 'precioTotal':precioTotal},
	       	url: "controller/cReservaInsert.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){  
	       		
	       		console.log(result);
	       		alert(result);
	       		location.reload(true);  //recarga la pagina
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	    });
	  	
});
}
