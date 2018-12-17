<?php require_once "../templates/master.php";
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";
?>

<script src="/riddle_abp/assets/js/cookies.js"></script>
<script src="/riddle_abp/assets/js/enigma5.js"></script>
<script src="/riddle_abp/assets/js/enigma3-typewrite.js"></script>

<?php startblock("titulo"); ?>
Enigma 5
<?php endblock(); ?>


<?php startblock("principal"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma5.css">

<div class="main font-letter">
    <div class="titulo">
        <h1 class="title">CONSECUENCIAS</h1>
    </div>

    <div class="reaccionesinmediatas">
        <p class="primerTexto">El ataque a Pearl Harbor provoco la muerte de más de <span class="blood">2500</span>
            personas y casi
            1300 resultaron heridas. De todas las víctimas mortales, 68 eran civiles.
        </p>
        <p class="segundoTexto">Al día siguiente, Estados Unidos declaró la guerra a Japón e inició su participación en
            la Segunda Guerra Mundial.
        </p>
        <p class="tercerTexto">Entre el 6 y el 9 de agosto de 1945, EEUU bombardeó con armas nucleares a 67
            ciudades japonesas y provocaron la muerte de unas <span class="blood">214.000</span>
            personas.</p>
        <p class="cuartoTexto">
            Aún hoy aparecen nuevas patologías relacionadas con los residuos nucleares generados por el bombardeo.
        </p>
        <p class="finalTexto">
            <span style="font-size: 40px">Gracias por jugar!</span>
            <br>Esperamos que hayas apredido mucho.
        </p>
        <div class="about opacity-0">
            <p><br>Para conocer más sobre el ataque visita: <br><a target="_blank" href="http://www.pearlharborhistoricsites.org/">www.pearlharborhistoricsites.org</a></p>
            <p>Para saber más sobre nosotros: <br><a href="/riddle_abp/php/body/index.php#scroll">Conocenos.</a> </p>
        </div>
    </div>
</div>




<?php endblock(); ?>