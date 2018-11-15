<?php require_once $_SERVER['DOCUMENT_ROOT']."/riddle_abp/php/conexion/conexion.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$res = selectUser($email, $password);

if(count($res)==0){
    $_SESSION['error']='Usuario o contraseña incorrectos.';
    header("Location: /riddle_abp/php/body/login.php");
    exit();
}
else{
    $_SESSION['username'] = "name";
    $_SESSION['email'] = "email";
    header("Location: /riddle_abp/php/body/index.php");
    exit();
}

//conexion.php

function selectUser($email, $password){
    $conn = openBD();
    
    $sentencia = $conn->prepare("select * from users where email = :email and password = :password");
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->execute();

    $result = $sentencia->fetchAll();

    $conn = closeBD();

    return $result;
}?>