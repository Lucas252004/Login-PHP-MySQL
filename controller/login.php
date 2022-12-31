<?php
session_start();
require_once('../model/db_connect.php');
$conn = new Database();
if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $pass = md5($pass);
    if(empty($uname)){
        header("Location: ../views/login_page.php?error=Nombre de usuario y/o contraseña incorrecto");
        exit();
    }else if(empty($pass)){
        header("Location: ../views/login_page.php?error=Nombre de usuario y/o contraseña incorrecto");
        exit();
    }else{
        $result = $conn->verificarUsuario($uname, $pass);
        if(empty($result)){
            header("Location: ../views/login_page.php?error=Nombre de usuario y/o contraseña incorrecto");
            exit();
        }else{
            foreach($result as $row){
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['email'] = $row['name'];
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['time'] = time();
                header("Location: ../views/home.php");
                exit();
            }
        }
    }
}else{
    header("Location: index.php");
    exit();
}
?>