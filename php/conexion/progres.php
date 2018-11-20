<?php
session_start();

//Incluimos el archivo de conexión
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";


if(isset($_POST['gameStart'])){
    //Cogemos el email de user y el juego que va a hacer
    $game = $_POST['game'];
    $email = 'mansoksama@gmail.com';

    $verificar = consultaProgresUser($email, $game);
    if($verificar == 0){
        //Hacemos insert
        newProgressUser($game, $email, 0);
        header('Location: /riddle_abp/php/body/index.php');        
    }else{
        header('Location: /riddle_abp/php/body/index.php');  
    }
}
?>