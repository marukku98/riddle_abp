<?php require_once "../templates/master.php"; 

include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php"; ?>
<script src="/riddle_abp/assets/js/cookies.js"></script>


<?php startblock("titulo"); ?>
Joc
<?php endblock(); ?>

<?php
if(!isset($_SESSION['user'])){
	header('Location: /riddle_abp/php/body/gamesGrid.php');
}?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/game.css">
<link rel="stylesheet" href="/riddle_abp/assets/css/play-animation.css">
<?php endblock(); ?>

<?php startblock("principal"); ?>

<div class="container title title-font ml-0 d-flex">
    <h2>ATAQUE A PEARL HARBOR</h2>
    <button id="info" class="info"></button>
</div>

<div class="row text-font">
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 p-3">
        <?php
            $game = 1;
            $email = $_SESSION['user']['email'];
            $var = selectProgressUser($game, $email);            

            if($var[0]['progres'] < 0){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game gam1 <?php echo $locked ?>">
            <div class="gameText">
                <h5 class="m-0">Nivel 1</h5>
                <p>Preparativos para la batalla</p>
            </div>
            <?php      
                if($var[0]['progres'] < 0){                   
                ?>
            <div class="lockHover"></div>
            <?php }else{                     
                    if($var[0]['progres'] >= 1){
                        $success = "success";  ?>
            <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }else{
                        $success = "game-button play-animation mt-3"; ?>
            <div onclick="display('1')" id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }
                     ?>
            <?php } ?>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 p-3">
        <?php
            $game = 1;
            $email = $_SESSION['user']['email'];
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] < 2){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game <?php echo $locked ?>">
            <div class="gameText">
                <h5 class="m-0">Nivel 2</h5>
                <p>Primera oleada</p>
            </div>
            <?php                       
                if($var[0]['progres'] < 2){
                ?>
            <div class="lockHover"></div>
            <?php }else{
                    if($var[0]['progres'] >= 3){
                        $success = "success";  ?>
            <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }else{
                        $success = "game-button play-animation mt-3"; ?>
            <div onclick="display('3')" id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }

                     ?>
            <?php } ?>

        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 p-3">
        <?php
            $game = 1;
            $email = $_SESSION['user']['email'];
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] < 3){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game gam4 <?php echo $locked ?>">
            <div class="gameText">
                <h5 class="m-0">Nivel 3</h5>
                <p>Segunda oleada</p>
            </div>
            <?php                       
                if($var[0]['progres'] < 3){
                ?>
            <div class="lockHover"></div>
            <?php }else{                    
                    if($var[0]['progres'] >= 4){
                        $success = "success";  ?>
            <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }else{
                        $success = "game-button play-animation mt-3"; ?>
            <div onclick="display('4')" id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }
                     ?>
            <?php } ?>
        </div>
        </body>

    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 p-3">
        <?php
            $game = 1;
            $email = $_SESSION['user']['email'];
            $var = selectProgressUser($game, $email);            

            if($var[0]['progres'] < 4){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game gamFinal <?php echo $locked ?>">
            <div class="gameText">
                <h5 class="m-0">Nivel 4</h5>
                <p>El desenlace</p>
            </div>
            <?php      
                if($var[0]['progres'] < 4){                   
                ?>
            <div class="lockHover"></div>
            <?php }else{                     
                    if($var[0]['progres'] >= 6){
                        $success = "success";  ?>
            <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }else{
                        $success = "game-button play-animation mt-3"; ?>
            <div onclick="display('5')" id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>
            <?php }
                     ?>
            <!-- game-button play-animation mt-3 -->
            <?php } ?>

        </div>
    </div>
    <?php endblock(); ?>

    <!-- Modal -->
    <div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                </div>
                <div class="modal-body">
                    Para jugar al siguiente nivel, dirígete a la siguiente pantalla!
                </div>
                <div class="modal-footer">
                    <input type="text" name="game" value="1" style="visibility:hidden;">
                    <input type="text" name="enigma" value="1" style="visibility:hidden;">
                    <button type="button" class="btn btn-secondary btn-sm" name="completed" data-dismiss="modal">De
                        acuerdo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Info -->
    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title-font" id="exampleModalLongTitle">Ataque a Pearl Harbor</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-font">
                    El ataque a Pearl Harbor fue un ataque militar sorpresa del Servicio Aéreo de la Marina Imperial
                    Japonesa
                    contra la base naval de los Estados Unidos en Pearl Harbor, la mañana del 7 de diciembre de 1941.
                    Este ataque desencadeno la entrada de los Estados Unidos en la Segunda Guerra Mundial.
                    <br>
                    <br>
                    En este "Riddle" te pondras en la piel del capitán Minoru Genda,
                    con el que conoceras la distintas fases del ataque y las consecuencias que desencadeno.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Empezemos!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="estacioModul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="infoEstacio"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#info").click(function () {
            $("#modalInfo").modal();
        });
        function display(enigma) {

            // var estacio = getCookie('estacio');

            if (/*estacio == 1 &&*/ enigma == 1) {
                window.location = "/riddle_abp/php/body/enigma" + enigma + ".php";
            } else if (/*estacio == 2 &&*/ enigma == 3) {
                window.location = "/riddle_abp/php/body/enigma" + enigma + ".php";
            } else if (/*estacio == 3 &&*/ enigma == 4) {
                window.location = "/riddle_abp/php/body/enigma" + enigma + ".php";
            } else if (/*estacio == 4 &&*/ enigma == 5) {
                window.location = "/riddle_abp/php/body/enigma" + enigma + ".php";
            } else {
                $('.infoEstacio').text('Dirígete a la estación ' + (parseInt(estacio) + 1));
                $('#estacioModul').modal();
            }
        }
    </script>
    <?php
if(isset($_SESSION['gameStart'])){
    unset($_SESSION['gameStart']);
}
?>
</div>