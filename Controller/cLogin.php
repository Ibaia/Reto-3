<?php
if(isset($_POST['login'])){
    $connection = new mysqli('localhost','root','','reto3');
    $email = $connection->real_escape_string($_POST['emailPHP']);
    $contrasenia =$connection->real_escape_string($_POST['contraseniaPHP']);
    //$nombre =$connection->real_escape_string($_POST['nombre']);
    
    $data = $connection->query("SELECT id, nombre FROM usuarios WHERE email='$email' AND contrasenia='$contrasenia'");
    

    if($data->num_rows>0){
        session_start();
        $_SESSION["email"]= $email;;
        echo $_SESSION["email"]= $email; 
   
        //echo $_SESSION[$contrasenia]; 
        //echo ("correct");
        /*$row = mysqli_fetch_array($data, MYSQLI_ASSOC);
        $row["validacion"]="correct";
        //exit("correct");
        
        $user= new usuarioClass();
        
        $user->setIdUsuario($row['id']);
        $user->setNombre($row['nombre']);
        $user->setNickName($row['nickName']);
        $user->setEmail($row['email']);
        
        array_push($this->list, $user);*/

        
    }else{
        //exit("failed");
        echo ("failed");
       
    }
}
?>