

function validatePassword(){
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;


  if(password != confirm_password) {
    alert("Las contraseñas no coinciden");
   
    return false;
  } else {
    
    alert("bien");
    return true;
  }
}
