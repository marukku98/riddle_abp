<?php
session_start();

//Incluimos el archivo de conexión
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";


if(isset($_POST['gameStart'])){

    if(!isset($_SESSION['user'])){
        $_SESSION['lastPage'] = "gamesGrid.php";
        header('Location: /riddle_abp/php/body/login.php'); 
    }else{
        $game = $_POST['game'];
        $email = "mansoksama@gmail.com";

        $verificar = consultaProgresUser($email, $game);

        if(count($verificar) == 0){      
            newProgressUser($game, $email, 0);
            header('Location: /riddle_abp/php/body/game.php');  
        }else{
            //update
            header('Location: /riddle_abp/php/body/game.php');
        }
    }
}

if(isset($_POST['completed'])){

    $game = $_POST['game'];
    $progres = $_POST['enigma'];
    $email = "mansoksama@gmail.com";
    updateProgressUser($game, $email, $progres);
    header('Location: /riddle_abp/php/body/game.php');  

}
?>