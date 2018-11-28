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
                        $success = "success";                          
                    }else{
                        $success = "game-button play-animation mt-3";
                    }
                     ?>  
                                          
                <div id="compEnigma" name="comprobarEnigma" class="<?php echo $success ?>"></div>    

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
                        $success = "success";                          
                    }else{
                        $success = "game-button play-animation mt-3";  
                    } 
                    
                    ?>                   
                    <div id="compEnigma" class="<?php echo $success ?>"></div>                   
                <?php } ?>  

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
                        $success = "success";                          
                    }else{
                        $success = "game-button play-animation mt-3";  
                    }                     
                    ?>                   
                    <div id="compEnigma" class="<?php echo $success ?>"></div>                   
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

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$("#compEnigma").click(function () {
    var cookie = getCookie('enigma1');
    var estacio = getCookie('estacio');

    if(cookie == 1 && estacio == 1 ){
        alert('Dirígete al siguiente punto de interés');
    }else if(cookie == 1 && estacio == 2){
        window.location="/riddle_abp/php/body/enigma2.php";
    }else if(cookie == 2 && estacio == 2){
        alert('Dirígete al siguiente punto de interés');
    }else if(cookie == 2 && estacio == 3){
        window.location="/riddle_abp/php/body/enigma3.php";
    }        		
});

</script>