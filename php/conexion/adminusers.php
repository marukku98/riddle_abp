<?php

function checkUser(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] != 1 && $_SESSION['user']['role'] != 2){
            header('Location: /riddle_abp/php/body/index.php');            
        }
    }else{
        header('Location: /riddle_abp/php/body/index.php');
    }
}

function openBD(){

    $servername = "hostingmysql328.nominalia.com";
    $username = "daw2a01";
    $password = "riddleteam1998";

    $conn = new PDO("mysql:host=$servername;dbname=daw2a01;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function closeBD(){
    return null;
}

function selectUsers(){
    $conn = openBD();
    
    try{
        $sentencia = $conn->prepare("select * from users limit 50");
        $sentencia->execute();
        $result = $sentencia->fetchAll();
        $conn = closeBD();
    }catch(PDOException $e){
            
    }

    return $result;
}

function deleteUserByID($email){
    $conn = OpenBD();

    try{
        $sentencia = $conn->prepare("delete from users where email = :email");
        $sentencia->bindParam(':email', $email);    
        $sentencia->execute();
    }catch(PDOException $e){
        $_SESSION['bd_error']= 'delete error';        
    }

    $conn = closeBD();
}

function editUser($email, $name){
    $conn = OpenBD();
    try{
        $sentencia = $conn->prepare("update users set username = :name where email = :email");
        $sentencia->bindParam(':name', $name);
        $sentencia->bindParam(':email', $email);
        $sentencia->execute();
    }catch(PDOException $e){
        $_SESSION['bd_error']= 'edit error';
    }

    $conn = closeBD();
}

function changePermission($email, $role){
    $conn = OpenBD();
    try{
        if($role==1){
            $sentencia = $conn->prepare("update users set role = 0 where email = :email");
        }elseif($role==0){
            $sentencia = $conn->prepare("update users set role = 1 where email = :email");
        }
        $sentencia->bindParam(':email', $email);
        $sentencia->execute();

    }catch(PDOException $e){
        $_SESSION['bd_error']= 'edit error';
    }

    $conn = closeBD();
}
?>