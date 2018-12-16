<?php require_once "../templates/master.php";
include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php";
?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma3.css">
<script src="/riddle_abp/assets/js/enigma3.js"></script>
<script src="/riddle_abp/assets/js/enigma3-typewrite.js"></script>
<?php endblock(); ?>

<?php startblock("titulo"); ?> Pearl Harbor 3
<?php endblock(); ?>

<?php startblock("principal"); ?>


<?php
if(!isset($_SESSION['user'])){
	$_SESSION['lastPage'] = $_POST['lastpage'];
	$_SESSION['lvl'] = '2';
	header('Location: /riddle_abp/php/body/login.php');
}else{
    $_SESSION['progres'] = '1';

	$game = 1;
	$email = $_SESSION['user']['email'];

	$var = selectProgressUser($game, $email); 
	if($var[0]['progres'] != 1 && $_SESSION['user']['role'] == 0){  ?>
<script>
    window.location = "/riddle_abp/php/body/game.php";
</script>
<?php }
   
}
 ?>


<div class="container-fluid">

    <div class="m-4 text" style="min-height: 700px;">
        <div class="enunciado" style="min-height: calc(400px - 13vw);">
            <div class="row">
                <h3 id="titulo-enunciado" class="font-letter font-weight-bold"></h3>
            </div>
            <div class="row">
                <h4 id="subtitulo-enunciado" class="font-letter font-weight-bold"></h4>
            </div>
            <div class="row">
                <p id="texto-enunciado" class="font-letter font-weight-bold"></p>
            </div>
            <div class="row">
                <p id="texto-enunciado2" class="font-letter font-weight-bold"></p>
            </div>
        </div>
        <div class="row float-right">
            <button class="btn btn-dark btn-play text-font" onclick="saltar(english);">Saltar</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="m-auto bg-card game" hidden>
            <div class="hide">
                <div class="end">
                    <h3 class="end-text japan-font"></h3>
                    <button class="btn-lose" onclick="restart();"></button>
                    <form action="/riddle_abp/php/conexion/progres.php" method="POST">
                        <input type="hidden" name="game" value="1">
                        <input type="hidden" name="enigma" value="3">
                        <button type="submit" id="success" class="btn-win" name="completed"></button>
                    </form>
                </div>
                <div class="row ml-box pb-1">
                    <div class="col">
                        <div class="mt-2" style="display: inline-flex;">
                            <img src="/riddle_abp/assets/img/misil-icon.png" height="40px" alt="">
                            <h3 class="text-center ml-2" id="misiles"></h3>
                        </div>
                        <script>setMisiles(tiros);</script>
                    </div>
                    <div class="col">
                        <button title="" class="btn-kamikaze btn-kamikaze-hover ml-4 float-right" onclick="toggleKamikaze();"></button>
                    </div>
                </div>

                <div class="sea mt-1">
                    <div class="block"></div>
                    <?php
                        for ($i=0; $i < 10; $i++) { 
                            for ($j=0; $j < 10; $j++) { 
                                echo '<button class="box box-hover" 
                                            id="'.(($i*10)+$j).'" 
                                            onclick="apuntar('.(($i*10)+$j).', barcos_enemigos, campo_enemigo)"
                                            style="top:'.(36.36363636363636*($i+1)).'px; left:'.(36.36363636363636*($j+1)).'px;">
                                    </button>';
                            } 
                        }
                    ?>

                    <?php
                if(isset($_SESSION['user'])){ 
                    // echo json_encode($_SESSION['user']);
                    if($_SESSION['user']['role'] >= 1){
                        echo '<button id="ALL">ALL</button>';
                        echo '<button id="reset">reset</button>';
                        echo '<button id="win">win</button>';
                        echo '<button id="lose">lose</button>';
                    }
                }
            ?>
                </div>
                <div class="row mt-3 ml-box position-relative" style="margin-left: 30px;">
                    <div id="alert" class="m-auto" style="color: transparent;">
                        <h1 id="alert-text" class="title-font">.</h1>
                    </div>
                    <div id="kamikaze-alert" class="m-auto kamikaze-alert invisible">
                        <h1 id="kamikaze-text" class="title-font text-center">.</h1>
                    </div>
                </div>

                <!--**SPANISH MODALS**-->

                <!-- Modal 1 -->
                <div id="modal1" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">¿Cómo jugar?</h5>

                            </div>
                            <div class="modal-body">
                                El siguiente enigma está basado en el tradicional
                                <b>'Hundir la flota'</b>, aunque lo hemos adaptado a un solo jugador y le hemos añadido
                                mecánicas
                                totalmente originales. Veámoslas...
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-1" type="button" class="btn btn-success" data-dismiss="modal">Siguiente</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 2 -->
                <div id="modal2" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Mecanicas</h5>

                            </div>
                            <div class="modal-body">
                                <p class="mb-0">
                                    <b>Munición. </b>El número de misiles es limitado, si te quedas sin pierdes.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/ammo_pic.png" height="60px"
                                    style="margin-bottom: 30px !important">
                                <p class="mb-0">
                                    <b>Kamikaze. </b>Apretando este botón activaras/desactivaras el modo kamikaze, un
                                    disparo
                                    en área muy útil. Solo tienes uno, así que úsalo con cabeza.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/kamikaze_pic.png" height="60px"
                                    style="margin-bottom: 30px !important">
                                <p>
                                    <b>Banderas. </b>Haciendo clic derecho podrás marcar y bloquear las casillas donde
                                    sepas
                                    que no hay barcos.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/flag_pic.png" height="80px"
                                    style="margin-bottom: 30px !important">
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-2" type="button" class="btn btn-success" data-dismiss="modal">Siguiente</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 3 -->
                <div id="modal3" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">El enemigo</h5>

                            </div>
                            <div class="modal-body">
                                <p>La flota estadounidense está compuesta por 5 barcos uno de 2 bloques de longitud, 2
                                    de 3,
                                    uno de 4 y otro de 5.
                                    <br>Estos, para evitar accidentes, mantienen una distancia de como mínimo un bloque
                                    como
                                    puedes ver en esta imagen.</p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/grid.png" height="250px">
                                <p>
                                    <br>Ahora ya dispones de toda la información necesaria para dirigir el ataque.
                                    ¡Mucha suerte!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-3" type="button" class="btn btn-success" data-dismiss="modal">JUGAR</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--**ENGLISH MODALS**-->

                <!-- Modal 1 -->
                <div id="modal1en" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">¿How to play?</h5>

                            </div>
                            <div class="modal-body">
                                The following enigma is based on the traditional <b>'Battleship'</b>,
                                although we have adapted it to a single player and we have added totally original
                                mechanics.
                                Let's see them ...
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-1en" type="button" class="btn btn-success" data-dismiss="modal">Next</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 2 -->
                <div id="modal2en" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Mechanics</h5>

                            </div>
                            <div class="modal-body">
                                <p class="mb-0">
                                    <b>Ammo. </b>The number of missiles is limited, if you stay without you lose.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/ammo_pic.png" height="60px"
                                    style="margin-bottom: 30px !important">
                                <p class="mb-0">
                                    <b>Kamikaze. </b>Pressing this button you will activate / deactivate the Kamikaze
                                    mode, a very useful area shot.
                                    You only have one, so use it carefully.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/kamikaze_pic.png" height="60px"
                                    style="margin-bottom: 30px !important">
                                <p>
                                    <b>Flags. </b>By right clicking you can mark and block the boxes where you know
                                    there are no boats.
                                </p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/flag_pic.png" height="80px"
                                    style="margin-bottom: 30px !important">
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-2en" type="button" class="btn btn-success" data-dismiss="modal">Next</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 3 -->
                <div id="modal3en" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">The enemy fleet</h5>

                            </div>
                            <div class="modal-body">
                                <p>The US fleet consists of 5 ships, one of 2 blocks in length, 2 of 3, one of 4 and
                                    another of 5.
                                    <br>These, to avoid accidents, maintain a distance of at least one block as you can
                                    see in this image.</p>
                                <img class="m-auto d-block" src="/riddle_abp/assets/img/grid.png" height="250px">
                                <p>
                                    <br>Now you have all the information necessary to direct the attack. Good luck!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button id="modal-btn-3en" type="button" class="btn btn-success" data-dismiss="modal">PLAY</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tools game">
                <button class="btn-help" onclick="tutorial();"></button>
            </div>
        </div>
    </div>

</div>

</div>

</div>

<script>
    showText(english);
</script>

<?php endblock(); ?>