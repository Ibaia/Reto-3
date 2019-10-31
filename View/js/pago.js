var reservasLS=localStorage['cafe'];

$(document).ready(function(){
	//fillPago();

	$("#reserva").click(function(){

		var fechaUso=$("#fechaUso").val();
		var nombreUsuario=$("#Nombre").val();
		var apellidoUsuario=$("#Apellido").val();
		var numTel=$("#numTel").val();
		var dni=$("#dni").val();
		var precioTotal=$("#precioTotal").val();

		console.log(reservasLS);
		
	  	$.ajax({
	       	type: "GET",
	       	data:{'reservasLS': reservasLS,'fechaUso':fechaUso, 'nombreUsuario':nombreUsuario, 'apellidoUsuario':apellidoUsuario, 'numTel':numTel, 'dni':dni, 'precioTotal':precioTotal},
	       	url: "../controller/cInsertReserva.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){  
	       		
	       		console.log(result);
	       		alert(result);	       		
	       		//location.reload(true);  //recarga la pagina
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	    });
	  	
	});
	
	

});
 	/*
//Calcular el total
function fillPago(){
	var numenOrdenador = "";
	var precio = "";
	var precioTotal = "";
	numenOrdenador +=$( "#numOrd" ).val();
	precio +=$( "#precioIndividual" ).val();    

	precioTotal = numenOrdenador * precio;
	$( "#precioTotal" ).val( precioTotal );
});*/

