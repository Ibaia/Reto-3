function validatePassword(){
  var password = document.getElementById("contrasenia").value;
  var confirm_password = document.getElementById("confirm_password").value;


  if(password != confirm_password) {
    alert("Las contraseñas no coinciden");
   
    return false;
  } else {
    
    //alert("bien");
    return true;
  }
}

$(document).ready(function(){
/*ajax*/
$("#btnInsert").click(function(){
	
	var confirm_password = document.getElementById("confirm_password").value;
	
	var nombre = $("#nombre").val();
	var contrasenia= $("#contrasenia").val();
	var nickName= $("#apodo").val();
	var residencia= $("#residencia").val();
	var email =$("#email").val();
	
	
	if(nombre == "" || contrasenia =="" || nickName =="" || residencia=="" || email=="" || contrasenia != confirm_password){
		alert("Campos vacios o incorrectos");
		return false;
		
	}else{
		$.ajax({
		   	type:"GET",
		   	data: {"nombre":nombre, "contrasenia":contrasenia, "nickName":nickName, "residencia":residencia, "email":email},
		   	url: "../Controller/cInsertUser.php", 
			datatype: "json",  //type of the result
		   	
			success: function(result){  
		   		//alert(result);
		   		console.log(result);
		   		alert(result);
		   		return true;
		   		//location.reload(true)
		   
		   	},
		   	error : function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			}); 	
	}

});

});