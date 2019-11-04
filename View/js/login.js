
function validar(){
    var email = document.getElementById("email").value;
    var contraseña = document.getElementById("contraseña").value;
    alert(email);
    alert(contraseña);
    if(email == "admin@gmail.com" && contraseña == "admin") {
      
      return true;
    }else{
        return false;
    }
  }

$(document).ready(function(){
	$("#login").on('click',function(){
	    var email = document.getElementById("email").value;
	    var contrasenia = document.getElementById("contrasenia").value;
	   
	    if((email=="") || (contrasenia=="")){
	    	
	    }else{
	    	alert("Llamar controller");
	    	$.ajax({
			    type:"POST", 
			    url: "../controller/cLogin.php", 
			    dataType: "text",  //type of the result
			    data:{'login':1,'emailPHP':email,'contraseniaPHP':contrasenia},
			    success: function(result){
			    	
			    	
			        console.log(result);
			        alert(result);
			        
			        if (result!="failed"){
			        	alert("Correcto");
			        	if(email=="admin@gmail.com" || contrasenia=="admin"){
			        		alert("admin");
			        		window.location.href="vAdmin.html";
			        	}else{
			        		alert("user");
			        		window.location.href="../Index.php";
			        		
			        	}
			        	
			        }else if(result=="failed"){
			        	alert("Fallo");
			        	alert("El email o la contrase�a son incorrectas");
			        }

			        	
			 },
			    error : function(xhr) {
			        alert("An error occured: " + xhr.status + " " + xhr.statusText);
			    }
			});
	    }
	    
	    
	    
	  });
	
	


});
