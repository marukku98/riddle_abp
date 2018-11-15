<?php

function openBD(){

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=riddle;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function closeBD(){
    return null;
}

function insertarUsers($username, $email, $password){
    $con = openBD();

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("insert into users(username, email, password) values (:username, :email, :password)");
    $sentencia->bindParam(':username', $username);
    $sentencia->bindParam(':email', $email); 
    $sentencia->bindParam(':password', $password); 

    $sentencia->execute();

    $_SESSION['mensaje'] = 'Registro insertado correctamente'; 

    }catch(PDOException $e){

        $_SESSION['error'] = 'Error boludo'; 

    } 
      //Cerrar conexion
      $con = closeBD();
}

function selectUserByEmail($email){

    $con = openBD();

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("select * from users WHERE email = :email");
    $sentencia->bindParam(':email', $email); 
    $sentencia->execute(); 
    $result = $sentencia->fetchAll();

    $registros = count($result);


    }catch(PDOException $e){

        $_SESSION['error'] = 'Error boludo'; 

    } 
      //Cerrar conexion
      $con = closeBD();

      return $registros;

}
?>