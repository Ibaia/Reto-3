$(document).ready(function(){
	$("#login").on('click',function(){
	    var email = document.getElementById("email").value;
	    var contrasenia = document.getElementById("contrasenia").value;
	   
	    if((email=="") || (contrasenia=="")){
	    	
	    }else{
	    	alert("Llamar controller");
	    	$.ajax({
			    type:"POST", 
			    url: "../Controller/cLogin.php", 
			    datatype: "text",  //type of the result
			    data:{'login':1,'emailPHP':email,'contraseniaPHP':contrasenia},
			    success: function(result){
			    	
			    	
			        console.log(result);
			        
			        if (result=="correct"){
			        	alert("Correcto");
			        	if(email=="admin@gmail.com" || contrasenia=="admin"){
			        		alert("admin");
			        		window.location.href="adim.html";
			        	}else{
			        		alert("user");
			        		window.location.href="pago.html";
			        		
			        	}
			        	
			        }else if(result=="failed"){
			        	alert("Fallo");
			        	alert("El email o la contraseña son incorrectas");
			        }

			        	
			 },
			    error : function(xhr) {
			        alert("An error occured: " + xhr.status + " " + xhr.statusText);
			    }
			});
	    }
	    
	    
	    
	  });


});
	
