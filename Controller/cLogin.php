<?php

if(isset($_POST['login'])){
    $connection = new mysqli('localhost','root','','reto3');

    $email = $connection->real_escape_string($_POST['emailPHP']);
    $contrasenia =$connection->real_escape_string($_POST['contraseniaPHP']);
    
    $data = $connection->query("SELECT id FROM usuarios WHERE email='$email' AND contrasenia='$contrasenia'");
    
    if($data->num_rows>0){
       
        exit("correct");
        echo ("correct");
       
        
    }else{
        exit("failed");
        echo ("failed");
       
    }
    

}

?>