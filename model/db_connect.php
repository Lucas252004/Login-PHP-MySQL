<?php
class Database{
    private $con; 
    //constructor
    public function __construct()
    {
        //me conecto a la base de datos bd_prueba
        $this->con = new mysqli('localhost', 'root', '', 'users');
    }
    public function registrarUsuario($uname, $email, $pass){
        $sql = $this->con->query("INSERT INTO users (name, email, password) VALUES ('$uname', '$email', '$pass')");
        echo "Usuario registrado con Exito !";
    } 
    public function verificarUsuario($uname, $pass){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM users WHERE name = '$uname' AND password = '$pass'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }  
    public function verificarUsuarioExistente($uname, $email){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM users WHERE name = '$uname' OR email = '$email'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    }

?>