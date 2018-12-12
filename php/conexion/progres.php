<?php
session_start();

//Incluimos el archivo de conexión
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";


if(isset($_POST['gameStart'])){

    if(!isset($_SESSION['user'])){
        $_SESSION['lastPage'] = $_POST['lastpage'];
        header('Location: /riddle_abp/php/body/login.php'); 
    }else{
        $game = $_POST['game'];
        $email = $_SESSION['user']['email'];

        $verificar = consultaProgresUser($email, $game);

        if(count($verificar) == 0){      
            newProgressUser($game, $email, 0);
            header('Location: /riddle_abp/php/body/game.php');  
        }else{
            //update
            header('Location: /riddle_abp/php/body/game.php');
        }
    }
    unset($_POST['lastpage']);
}

if(isset($_POST['completed'])){
    $game = $_POST['game'];
    $progres = $_POST['enigma'];
    $email = $_SESSION['user']['email'];
    updateProgressUser($game, $email, $progres);
    header('Location: /riddle_abp/php/body/game.php'); 
}


?>