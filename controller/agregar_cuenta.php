<?php
require_once("../model/db_connect.php");
$conn = new Database();
if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['email'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $pass = md5($pass);
    if(empty($uname)){
        header("Location: ../index.php?error=Nombre de Usuario requerido");
        exit();
    }else if(empty($pass)){
        header("Location: ../index.php?error=Contraseña requerida");
        exit();
    }else if(empty($email)){
        header("Location: ../index.php?error=Correo electronico requerido");
        exit();
    }else{
        $result = $conn->verificarUsuarioExistente($uname, $email);
        if(empty($result)){
            $conn->registrarUsuario($uname, $email, $pass);
            header("Location: ../views/home.php");
        }else{
            header("Location: ../index.php?error=Las credenciales ya estan en uso");
        }
        
    }
}else{
    header("Location: ../views/home.php.php");
    exit();
}
?>
