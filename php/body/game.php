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

<script>
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
</script>

<div class="row">

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">

        <div class="game">
            <div class="div-text gameText">
                <h5 class="text m-0">Nivel 1</h5>
                <p>Preparativos para la batalla</p>
            </div>
            <a href="enigma1.php">
            <script>setCookie('enigma1', 1, 3);</script>   
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
            if($var[0]['progres'] != 1){
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
                if($var[0]['progres'] != 1){
                ?>
                <div class="lockHover"></div>                
                <?php }else{?>   
                               
                    <div id="next" class="game-button play-animation mt-3"></div> 
                                        
                <?php } ?>  
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] != 2){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game <?php echo $locked ?>">
            <div class="gameText">
                <h5 class="m-0">Nivel 3</h5>                
                <p>Segunda oleada</p>
            </div>
            <?php                       
                if($var[0]['progres'] != 2){
                ?>
                <div class="lockHover"></div>                
                <?php }else{?>                   
                    <div id="next" class="game-button play-animation mt-3"></div>                   
                <?php } ?>  

        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] != 3){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game <?php echo $locked ?>">
        <div class="gameText">
                <h5 class="m-0">Nivel 4</h5>                
                <p>Las consequencias</p>
            </div>
            <?php                       
                if($var[0]['progres'] != 3){
                ?>
                <div class="lockHover"></div>                
                <?php }else{?>                   
                    <div id="next" class="game-button play-animation mt-3"></div>                   
                <?php } ?>  
        </div>
       </body>

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
                <button type="button" class="btn btn-secondary btn-sm" name="completed" data-dismiss="modal" >De acuerdo</button>
            </div>
        </div>
    </div>
</div>

<script>

$("#next").click(function () {
    if(<?php echo $_COOKIE["enigma1"] ?> == 1){
        $("#finalModal").modal("show");   
    }else{
        //move ??      
          
    }
});

</script>