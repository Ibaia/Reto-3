var reservasLS=localStorage['ordenadores'];
var reservas=JSON.parse(localStorage['ordenadores']);

function validateNumber(event) {
    var num = document.getElementById("numTel").value

    var x = event.which || event.keyCode;
        
    if(x >= 48 && 57 >= x && num.length < 9){
        return true;
    }else{
        return false;
    }
 
}
$(document).ready(function(){
	
	
	var fecha =localStorage.getItem("fechaUso");
	var ordenadoresLength=reservas.length;
	console.log(reservasLS);
	
	
	$("#fechaUso").val(fecha);
	$("#numOrd").val(ordenadoresLength);
	
	fillPago();
	$("#reserva").click(function(){
		
		alert("aaa");
		
		var fechaUso=$("#fechaUso").val();
		var nombreUsuario=$("#nombre").val();
		var apellidoUsuario=$("#apellido").val();
		var numTel=$("#numTel").val();
		var dni=$("#dni").val();
		var price=$("#price").text();

		console.log(reservasLS);
		console.log("Hola");
		
	  	$.ajax({
	       	type: "GET",
	       	data:{
	       		'reservasLS': reservasLS,
	       		'fechaUso':fechaUso, 
	       		'nombreUsuario':nombreUsuario, 
	       		'apellidoUsuario':apellidoUsuario, 
	       		'numTel':numTel, 
	       		'dni':dni, 
	       		'price':price},
	       		
	       	url: "../Controller/cInsertReserva.php", 
	       	dataType: "text",  //type of the result
	       	success: function(result){  
	       		
	       		console.log(result);
	       		alert(result);	       		
	       		//location.reload(true);  //recarga la pagina
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	    });	  	
//	  	$.ajax({
//	       	type: "GET",
//	       	data:{'reservasLS': reservasLS,'fechaUso':fechaUso, 'nombreUsuario':nombreUsuario, 'apellidoUsuario':apellidoUsuario, 'numTel':numTel, 'dni':dni, 'price':price},
//	       	url: "../Controller/cInsertReserva.php", 
//	       	dataType: "json",  //type of the result
//	       	success: function(result){  
//	       		
//	       		console.log(result);
//	       		alert(result);	       		
//	       		//location.reload(true);  //recarga la pagina
//	       	},
//	       	error : function(xhr) {
//	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
//	   		}
//	    });
	  	
	});
	
	

});
//Calcular el total
function fillPago(){
	var numenOrdenador = "";
	var precio = "";
	var precioTotal = "";
	numenOrdenador +=$( "#numOrd" ).val();
	precio +=$( "#precioIndividual" ).val();    

	precioTotal = numenOrdenador * precio;
	$( "#price" ).html( precioTotal+"&#8364;");
}

