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

function selectUser($email, $password){
    $conn = openBD();
    
    $sentencia = $conn->prepare("select * from users where email = :email and password = :password");
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->execute();

    $result = $sentencia->fetchAll();

    $conn = closeBD();

    return $result;
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

function consultaProgresUser($email, $game){
    $con = openBD();

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("select progres from progres where id = :game and email= :email");
    $sentencia->bindParam(':email', $email); 
    $sentencia->bindParam(':game', $game); 

    $sentencia->execute(); 
    $result = $sentencia->fetchAll();

    }catch(PDOException $e){
        $_SESSION['error'] = 'Error boludo'; 
    }

    //Cerrar conexion
    return $result;
}
function newProgressUser($game, $email, $progres){

    $con = openBD();

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("insert into progres(id, email, progres) values (:id, :email, :progres)");
    $sentencia->bindParam(':id', $game);
    $sentencia->bindParam(':email', $email); 
    $sentencia->bindParam(':progres', $progres); 

    $sentencia->execute();
    }catch(PDOException $e){
        $_SESSION['error'] = 'Error boludo'; 
    } 
      //Cerrar conexion
      $con = closeBD();
}

function updateProgressUser($game, $email, $progres){

    $con = openBD();

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("update progres set progres = :progres where id = :game and email = :email");
    $sentencia->bindParam(':game', $game);
    $sentencia->bindParam(':email', $email); 
    $sentencia->bindParam(':progres', $progres); 

    $sentencia->execute();

    }catch(PDOException $e){

        $_SESSION['error'] = 'Error boludo'; 

    } 
      //Cerrar conexion
      $con = closeBD();

}

function selectProgressUser($game, $email){

    $con = openBD();

    //$_SESSION['user']['email'];

    try{    
    //Consulta para insertar a la BD.
    $sentencia = $con->prepare("select progres from progres where id = :game and email = :email");
    $sentencia->bindParam(':game', $game);
    $sentencia->bindParam(':email', $email); 
    $sentencia->execute();

    $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e){

        $_SESSION['error'] = 'Error boludo'; 

    } 
      //Cerrar conexion
      $con = closeBD();

      return $result;
}
?>