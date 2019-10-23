
//Recibir los datos de usuarios y mostrarlos
$(document).ready(function(){
	
	$.ajax({
	    type:"GET",
	    url: "../controller/cAdmin.php", 
	    datatype: "json",  //type of the result
	
	 success: function(result){
	
	        var usuarios = JSON.parse(result);
	
	        console.log(result);
	        
	        $("#table_user").empty(); // removes all the previous content in the container
	
	        var newRow ="";
	       newRow +="<table > ";
	     newRow +="<tr><th>ID</th><th>NOMBRE</th><th>CONTRASENIAA</th><th>NICK NAME</th><th>RESIDENCIA</th></th><th>EMAIL</th></tr>";
	
	     $.each(usuarios,function(index,info) { 
	
	         newRow += "<tr>" +"<td>"+info.idUsuario+"</td>"
	                             +"<td>"+info.nombre+"</td>"
	                             +"<td>"+info.contrasenia+"</td>"
	                             +"<td>"+info.nickName+"</td>"
	                             +"<td>"+info.residecia+"</td>"
	                             +"<td>"+info.email+"</td>"
	                         +"</tr>";
	     });
	        newRow +="</table>";
	
	        $("#table_user").append(newRow); // add the new row to the container
	 },
	    error : function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }
	});
	
$.ajax({
	    type:"GET",
	    url: "../controller/cReserva.php", 
	    datatype: "json",  //type of the result
	    
	    success: function(result){
	    	
	    	var reserva = JSON.parse(result);
	    	console.log(reserva);
	    
	    	$("#table_reserve").empty();
	    	var newRow="";
	    	
	    	newRow +="<tr><th>ID</th><th>IDORDENADOR</th><th>FECHA DE RESERVA</th><th>FECHA DE USO</th><th>NOMBRE USUARIO</th></th><th>APELLIDO USUARIO</th><th>NUMERO DE TELEFONO</th><th>DNI</th><th>PRECIO</th></tr>";
	    	$.each(reserva,function(index,info) { 

	    	newRow += '<tr>'
	    	newRow += '<td class="col">'+info.idReserva+'</td>'
	    	newRow += '<td class="col">'+info.idOrdenador+'</td>'
	    	newRow += '<td class="col">'+info.fechaReserva+'</td>'
	    	newRow += '<td class="col">'+info.fechaUso+'</td>'
	    	newRow += '<td class="col">'+info.nombreUsuario+'</td>'
	    	newRow += '<td class="col">'+info.apellidoUsuario+'</td>'
	    	newRow += '<td class="col">'+info.numTel+'</td>'
	    	newRow += '<td class="col">'+info.dni+'</td>'
	    	newRow += '<td class="col">'+info.precioTotal+' &euro</td>'
	    	});
	    	newRow += '<tr>'
	    		
	    		$("#table_reserve").append(newRow);
		
			},
			error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	});
});