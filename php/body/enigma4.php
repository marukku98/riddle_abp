<?php require_once "../templates/master.php";
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";
?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma4.css">
<script src="/riddle_abp/assets/js/enigma4/joc.js"></script>
<script src="/riddle_abp/assets/js/enigma4/jugador.js"></script>
<script src="/riddle_abp/assets/js/enigma4/powerup.js"></script>
<script src="/riddle_abp/assets/js/enigma4/dispar.js"></script>
<script src="/riddle_abp/assets/js/enigma4/enemic.js"></script>
<script src="/riddle_abp/assets/js/enigma4/audio.js"></script>
<script src="/riddle_abp/assets/js/cookies.js"></script>

<?php endblock(); ?>

<?php startblock("titulo"); ?>
Enigma 4
<?php endblock(); ?>

<?php startblock("principal"); ?>
<?php
if($_SESSION['user']['role']==0){
?>
<script>
    var estacio = getCookie('estacio');
    if (estacio != 3){
        window.location = "/riddle_abp/php/body/game.php";
    }
</script>
<?php
}
if(!isset($_SESSION['user'])){
	$_SESSION['lastPage'] = $_POST['lastpage'];
	$_SESSION['lvl'] = '3';
	header('Location: /riddle_abp/php/body/login.php');
}else{
	$_SESSION['progres'] = '2';

	$game = 1;
	$email = $_SESSION['user']['email'];

	$var = selectProgressUser($game, $email); 
	if($var[0]['progres'] != 3 && $_SESSION['user']['role'] == 0){  ?>
<script>
    window.location = "/riddle_abp/php/body/game.php";
        </script>
<?php }   
}
 ?>

<div class="p-4">
    <div class="row" id="explicacion-oleada">
        <h3 class="font-letter">Segunda Oleada</h3>
        <p class="font-letter font-size">
            Una hora después de la primera oleada, 171 aviones se dirigen a Kaneohe y Pearl Harbor para bombardearlos
            en 3 grandes grupos dirigidos por Shimazaki Shigekazu.
            Tú formas parte de uno de los grupos con destino Pearl Harbor. <br>
            A diferencia de la primera, esta oleada ya no es tan sorpresa, y los americanos te están esperando con
            mejores defensas.<br />
            Destruye tantos enemigos como puedas, incluso si tienes que arriesgar tu propia vida.
        </p>
        <h3 class="col-lg-12 text-center font-letter">¡BANZAI!</h4>
            <div class="col-lg-12 text-center">
                <button type="button" id="btnEmpezar" class="btn btn-primary">Empezar</button>
            </div>

    </div>
</div>

<div id="joc" style="display:none">

    <div id="keyboard" class="p-2">
        <div class="row">
            <div class=" col-8 col-lg-6 keyboard-mov">
                <div class="row">
                    <button id="btnUp" class="btn btn-primary"><span class="fa fa-arrow-up"></span></button>
                </div>
                <div class="row">
                    <button id="btnLeft" class="btn btn-primary" style="margin-right: 20px;"><span class="fa fa-arrow-left"></span></button>
                    <button id="btnRight" class="btn btn-primary" style="margin-left: 20px;"><span class="fa fa-arrow-right"></span></button>
                </div>
                <div class="row">
                    <button id="btnDown" class="btn btn-primary"><span class="fa fa-arrow-down"></span></button>
                </div>
            </div>
            <div class="col-4 col-lg-6 keyboard-mov">
                <button id="btnShoot" class="btn btn-primary">SHOOT</button>
            </div>
        </div>
    </div>

    <div id="panel">
        <div id="panel-vidas">

        </div>

        <div id="panel-ronda">
            <p>RONDA <span class="numRonda"></span></p>
        </div>

        <div id="panel-powerup">

        </div>

        <div id="panel-score">
            <p>SCORE:
                <span id="score"></span>
            </p>
        </div>
    </div>

    <div id="explicacio" class="panel-over">
        <div id="selecControl" style="position:absolute; top:0; right: 0;">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="isPhone">
                <label class="custom-control-label" for="isPhone">Control tactil</label>
            </div>
        </div>
        <h2>Instrucciones</h2>
        <hr>
        <div id="explicacio-jugador">
            <p>Este es tu avión</p>
            <img src="../../assets/img/enigma4/avion-jp.png">

            <p>Y estos son tus enemigos</p>
            <div id="explicacio-avions">
                <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Curtiss P-40 Warhawk">
                    <img src="../../assets/img/enigma4/AV-1.png">
                </div>
                <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Boeing B-17 Flying Fortress">
                    <img src="../../assets/img/enigma4/AV-2.png">
                </div>
                <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Bell P-63 Kingcobra (Caza)">
                    <img src="../../assets/img/enigma4/AV-3.png">
                </div>
            </div>

            <p>Utiliza las flechas para mover el avión y el espacio para disparar</p>
            <div>
                <img src="../../assets/img/enigma4/exp-arrows.png" style="width:80px;">
                <img src="../../assets/img/enigma4/exp-space.jpg" style="width:180px;">
            </div>

            <p>Durante la partida, saldran ayudas que te haran el juego mas facil</p>
            <div id="explicacio-powerups">
                <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Doble velocidad">
                    <img class='f-img' src='../../assets/img/enigma4/coffee.png' />
                </div>
                <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Menos tiempo de recoil">
                    <img class='f-img' src='../../assets/img/enigma4/recoil.png' />
                </div>
                <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Bala gigante">
                    <img class='f-img' src='../../assets/img/enigma4/bala-powerup.png' />
                </div>
                <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Vida extra">
                    <img class='f-img' src='../../assets/img/enigma4/tools.png' />
                </div>
            </div>

            <div class="btnBit" onclick="start()">
                START
            </div>
        </div>
    </div>
    <div id="gameover" class="panel-over panel-over-hidden">
        <h1>GAME OVER</h1>
        <h2>Score: <span id="score-final"></span></h2>
        <div class="btnBit" onclick="location.reload();">
            TRY AGAIN?
        </div>
        <form id="frmCompleted" action="/riddle_abp/php/conexion/progres.php" method="POST">
            <input type="hidden" name="game" value="1">
            <input type="hidden" name="enigma" value="4">
            <button type="submit" id="success" class="btnBit" name="completed">CONTINUAR</button>
        </form>
    </div>

    <div id="ronda" class="panel-over panel-over-hidden">
        <h1 id="text-ronda">RONDA <span class="numRonda"></span></h1>
    </div>
</div>


<script>
$('[data-toggle="tooltip"]').tooltip();

$("#btnEmpezar").on("click", function() {
    $("#explicacion-oleada").fadeOut(1000, function() {
        $("#joc").fadeIn(1000);
    });

});
</script>
<?php endblock(); ?>