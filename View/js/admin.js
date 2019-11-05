var usuarios;
//Recibir los datos de usuarios y mostrarlos
$(document).ready(function(){
	
	
	$.ajax({
	    type:"GET",
	    url: "../Controller/cAdmin.php", 
	    dataType: "json",  //type of the result
	    
	 success: function(result){
	        console.log(result);

		  	usuarios = result;

	        
	        $("#table_user").empty(); // removes all the previous content in the container

	        var newRow ="<h2>Usuarios</h2>";
	       newRow +="<table > ";
	     newRow +="<tr><th>ID</th><th>NOMBRE</th><th>Pass</th><th>NICK NAME</th><th>RESIDENCIA</th></th><th>EMAIL</th></tr>";

	     $.each(usuarios,function(index,info) { 

	         newRow += "<tr>" +"<td>"+info.idUsuario+"</td>"
	                             +"<td>"+info.nombre+"</td>"
	                             +"<td>"+info.contrasenia+"</td>"//Undefined
	                             +"<td>"+info.nickName+"</td>"
	                             +"<td>"+info.residecia+"</td>"//Undefined
	                             +"<td>"+info.email+"</td>"//Undefined
	                             +"<td><button class='btnDelete btn-danger' value='"+info.idUsuario+"'><i class='fas fa-trash-alt'></i></button></td>"
	                             +"<td><button class='btnUpdate btn-success' value='"+info.idUsuario+"' data-toggle='modal' data-target='#update'><i class='fas fa-edit'></i></button></td>"
	                         +"</tr>";
	         
	     });
	     
	        newRow +="</table>";

	        $("#table_user").append(newRow); // add the new row to the container
	        
	        //Boton delete
	        $(".btnDelete").click(function(){
	        	var id=$(this).val();
	        	deleteFunction(id);
	        });
	        //Modal Update
	        $(".btnUpdate").click(function(){

	        	$('#idUpdate').val($(this).closest("tr").children().eq(0).text());
				$('#nombreUpdate').val($(this).closest("tr").children().eq(1).text());
				$('#contraseniaUpdate').val($(this).closest("tr").children().eq(2).text());
				$('#nickNameUpdate').val($(this).closest("tr").children().eq(3).text());
				$('#residenciaUpdate').val($(this).closest("tr").children().eq(4).text());
				$('#emailUpdate').val($(this).closest("tr").children().eq(5).text());
	        });
	        	
	 },
	    error : function(xhr) {
	        alert("An error occured: " + xhr.status + " " + xhr.statusText);
	    }
	});
	//Fin de ajax usuarios

	 //Boton delete
	function deleteFunction(id) {
		
		console.log(id);
		alert(id);
		
		$.ajax({
	       	type: "GET",
	       	data:{ 'id':id},
	       	url: "../Controller/cDeleteUser.php", 

	       	success: function(result){  
	       		
	       		console.log(result);
	       		
	       		location.reload(true);  // recarga la pagina
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	   });
	  		
	}

	//Rellenar los datos para llamar al controlador y hacer el update
	$("#btnExecUpdate").click(function(){

		var id=$('#idUpdate').val();
		var nombre=$('#nombreUpdate').val();
		var contrasenia=$('#contraseniaUpdate').val();
		var nickName=$('#nickNameUpdate').val();
		var residencia=$('#residenciaUpdate').val();
		var email=$('#emailUpdate').val();

	  	$.ajax({
	       	type: "GET",
	       	data:{ 'id':id, 'nombre':nombre, 'contrasenia':contrasenia, 'nickName':nickName,'residencia':residencia,'email':email},
	       	url: "../Controller/cUpdateUser.php", 
	       	dataType: "text",  //type of the result
	       	success: function(result){  
	       		
	       		console.log(result);

	       		location.reload(true);  //recarga la pagina
	       		
	       		//Boton delete
		        
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	    });
	  		
	 });
	
	//RESERVA
$.ajax({
	    type:"GET",
	    url: "../Controller/cReserva.php", 
	    dataType: "json",  //type of the result
	    
	    success: function(result){
	    
	    	console.log(result);
	    
	    	$("#table_reserve").empty();
	    	var newRow="";
	    	
	    	newRow +="<tr><th class='col'>ID</th><th class='col'>FECHA DE USO</th><th class='col'>NOMBRE USUARIO</th><th class='col'>APELLIDO USUARIO</th><th class='col'>NUMERO DE TELEFONO</th><th class='col'>DNI</th><th class='col'>PRECIO</th></tr>";
	    	$.each(result,function(index,info) { 

	    	newRow += '<tr>'
	    	newRow += '<td class="col">'+info.idReserva+'</td>'
	    	newRow += '<td class="col">'+info.fechaUso+'</td>'
	    	newRow += '<td class="col">'+info.nombreUsuario+'</td>'
	    	newRow += '<td class="col">'+info.apellidoUsuario+'</td>'
	    	newRow += '<td class="col">'+info.numTel+'</td>'
	    	newRow += '<td class="col">'+info.dni+'</td>'
	    	newRow += '<td class="col">'+info.precioTotal+'&#8364;</td>'
	    	newRow += "<td class='col'><button class='btnDeleteReserva btn-danger' value='"+info.idReserva+"'><i class='fas fa-trash-alt'></i></button></td>"
            newRow += "<td class='col'><button class='btnUpdateReserva btn-success' value='"+info.idReserva+"' data-toggle='modal' data-target='#updateReserva'><i class='fas fa-edit'></i></button></td>"
	    	});
	    	newRow += '<tr>'
	    		
	    		$("#table_reserve").append(newRow);
	    	
	    	//Delete Reserva
	    	$(".btnDeleteReserva").click(function(){
	        	var id=$(this).val();
	        	deleteReserva(id);
	        });
	    	//Modal reserva
	        $(".btnUpdateReserva").click(function(){

	        	$('#idUpdateReserva').val($(this).closest("tr").children().eq(0).text());
				$('#fechaUsoUpdateReserva').val($(this).closest("tr").children().eq(1).text());
				$('#nombreUpdateReserva').val($(this).closest("tr").children().eq(2).text());
				$('#apellidoUpdateReserva').val($(this).closest("tr").children().eq(3).text());
				$('#numTelUpdateReserva').val($(this).closest("tr").children().eq(4).text());
				$('#dniUpdateReserva').val($(this).closest("tr").children().eq(5).text());
				$('#precioUpdateReserva').val($(this).closest("tr").children().eq(6).text());
	        });
			},
			error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	});
//Fin de ajax reserva


//Boton delete
function deleteReserva(id) {
	
	console.log(id);
	alert(id);
	
	$.ajax({
       	type: "GET",
       	data:{ 'id':id},
       	url: "../Controller/cDeleteReserva.php", 

       	success: function(result){  
       		
       		console.log(result);
       		
       		location.reload(true);  // recarga la pagina
       	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
   });
  		
}

//Rellenar los datos para llamar al controlador y hacer el update
$("#btnExecUpdateReserva").click(function(){
	
	var idReserva=$('#idUpdateReserva').val();
	var fechaUso=$('#fechaUsoUpdateReserva').val();
	var nombreUsuarioReserva=$('#nombreUpdateReserva').val();
	var apellidoUsuarioReserva=$('#apellidoUpdateReserva').val();
	var numTelReserva=$('#numTelUpdateReserva').val();
	var dniReserva=$('#dniUpdateReserva').val();
	var precioReserva=$('#precioUpdateReserva').val();

  	$.ajax({
       	type: "GET",
       	data:{ 'idReserva':idReserva,'fechaUso':fechaUso, 'nombreUsuarioReserva':nombreUsuarioReserva, 'apellidoUsuarioReserva':apellidoUsuarioReserva, 'numTelReserva':numTelReserva,'dniReserva':dniReserva,'precioReserva':precioReserva},
       	url: "../Controller/cUpdateReserva.php", 
       	dataType: "text",  //type of the result
       	success: function(result){  
       		
       		console.log(result);
       		alert(result);
       		location.reload(true);  //recarga la pagina
       		
       		//Boton delete
	        
       	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   			console.log(xhr);
   		}
//    }).done(function(){
//    	alert("hola");
//    }).fail(function(){
//    	alert("error");
//    });
  		
  	});
});
});