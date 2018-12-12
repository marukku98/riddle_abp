<?php require_once "../templates/master.php"; 

include $_SERVER['DOCUMENT_ROOT'] . "/riddle_abp/php/conexion/conexion.php"; ?>
<script src="/riddle_abp/assets/js/cookies.js"></script>


<?php startblock("titulo"); ?>
Joc
<?php endblock(); ?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/game.css">
<link rel="stylesheet" href="/riddle_abp/assets/css/play-animation.css">
<?php endblock(); ?>

<?php startblock("principal"); ?>

<div class="container title title-font ml-0">
    <h2>ATAQUE A PEARL HARVOR</h2>
</div>

<div class="row text-font">

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">

        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);            

            if($var[0]['progres'] < 0){
                $locked = "lockedImg";
            }else{
                $locked = "";
            }
        ?>
        <div class="game <?php echo $locked ?>">
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

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);            

            if($var[0]['progres'] < 1){
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
                if($var[0]['progres'] < 1){                   
                ?>
                <div class="lockHover"></div>                
                <?php }else{                     
                    if($var[0]['progres'] >= 2){
                        $success = "success";  ?>
                        <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>                            
                   <?php }else{
                        $success = "game-button play-animation mt-3"; ?>
                        <div onclick="display('2')" id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>    
                   <?php }
                     ?> 
                <!-- game-button play-animation mt-3                                          -->
            <?php } ?>  
           
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] < 2){
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

                     ?> <?php } ?>  

        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 p-3">
        <?php
            $game = 1;
            $email = "mansoksama@gmail.com";
            $var = selectProgressUser($game, $email);  
            if($var[0]['progres'] < 3){
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
                if($var[0]['progres'] < 3){
                ?>
                <div class="lockHover"></div>                
                <?php }else{                    
                    if($var[0]['progres'] == 4){
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

 function display(enigma){
   
    var cookie = getCookie('enigma1');
    var estacio = getCookie('estacio');

    if(cookie == estacio){
        alert('Dirígete al siguiente punto de interés');
    }else if(cookie == 0 && estacio == 1 && enigma == 1){
        window.location="/riddle_abp/php/body/enigma"+enigma+".php";  
    }else if(cookie == 1 && estacio == 2 && enigma == 2){
        window.location="/riddle_abp/php/body/enigma"+enigma+".php";    
    }else if(cookie == 2 && estacio == 3 && enigma == 3){
        window.location="/riddle_abp/php/body/enigma"+enigma+".php";
    }else if(cookie == 3 && estacio == 4 && enigma == 4){
        window.location="/riddle_abp/php/body/enigma"+enigma+".php";
    }
}

</script>