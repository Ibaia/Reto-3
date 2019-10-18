
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

        var newRow ="<h2>Usuarios</h2>";
       newRow +="<table > ";
     newRow +="<tr><th>ID</th><th>NOMBRE</th><th>CONTRASENIAA</th><th>NICK NAME</th><th>RESIDENCIA</th></th><th>EMAIL</th></tr>";

     $.each(usuarios,function(index,info) { 

         newRow += "<tr>" +"<td>"+info.idUsuario+"</td>"
                             +"<td>"+info.nombre+"</td>"
                             +"<td>"+info.contrasenia+"</td>"//Undefined
                             +"<td>"+info.nickName+"</td>"
                             +"<td>"+info.residecia+"</td>"//Undefined
                             +"<td>"+info.email+"</td>"//Undefined
                         +"</tr>";
     });
        newRow +="</table>";

        $("#table_user").append(newRow); // add the new row to the container
 },
    error : function(xhr) {
        alert("An error occured: " + xhr.status + " " + xhr.statusText);
    }
});
});