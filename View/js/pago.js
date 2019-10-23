$(document).ready(function(){
	
	$("#btnExecInsert").click(function(){
		
		var nombreUsuario=$("#Nombre").val();
		var apellidoUsuario=$("#Apellido").val();
		var AnioInsert=$("#AnioInsert").val();
		var DirectorInsert=$("#DirectorInsert").val();
		var cartelInsert=$("#cartelInsert").val();
	     
	  	$.ajax({
	       	type: "GET",
	       	data:{ 'TituloPeliculaInsert':TituloPeliculaInsert, },
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