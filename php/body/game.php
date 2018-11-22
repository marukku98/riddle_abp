<?php require_once "../templates/master.php"; 

include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php"; ?>



<?php startblock("titulo"); ?>
Joc
<?php endblock(); ?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/game.css">
<link rel="stylesheet" href="/riddle_abp/assets/css/play-animation.css">
<?php endblock(); ?>

<?php startblock("principal"); ?>

<div class="container title">
    <h2>Attack on Pearl Harbor</h2>
</div>
<div class="row">

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">

        <div class="game">
            <div class="div-text gameText">
                <h5 class="text m-0">Nivel 1</h5>
                <p>Preparativos para la batalla</p>
            </div>
            <a href="enigma1.php">
                <?php
                    $game = 1;
                    $email = "mansoksama@gmail.com";
                    $var = selectProgressUser($game, $email);  
                    if($var[0]['progres'] == 0){
                ?>
                <div class="game-button play-animation mt-3"></div>
                    <?php 
                }else{ ?>
                    <div class="success"></div>
                <?php } ?>            
                
            </a>
        </div>

    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] == 0){
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
                if($var[0]['progres'] == 0){
                ?>
                <div class="lockHover"></div>
                <?php }else{ ?>
                <a href="enigma1.php">
                    <div class="game-button play-animation mt-3"></div>
                </a>            
            <?php }?>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <div class="game lockedImg">
            <div class="gameText">
                <h5 class="m-0">Nivel 3</h5>
                <p>Segunda oleada</p>
            </div>
            <div class="lockHover"></div>

        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <div class="game lockedImg">
            <div class="gameText">
                <h5 class="m-0">Nivel 4</h5>
                <p>Las consequencias</p>
            </div>
            <div class="lockHover"></div>
        </div>






        </body>

    </div>
    <?php endblock(); ?>