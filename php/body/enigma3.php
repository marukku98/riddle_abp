<?php require_once "../templates/master.php" ?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma3.css">
<script src="/riddle_abp/assets/js/enigma3.js"></script>
<?php endblock(); ?>

<?php startblock("titulo"); ?> Enigma 3
<?php endblock(); ?>

<?php startblock("principal"); ?>




<div class="container-fluid">

    <div class="row mt-3">
        <div class="m-auto bg-card">
            <div class="end">
                <h3 class="end-text japan-font"></h3>
                <button class="btn-lose" onclick="restart();"></button>
                <form action="/riddle_abp/php/conexion/progres.php" method="POST">
                    <input type="hidden" name="game" value="2">
                    <input type="hidden" name="enigma" value="2">
                    <button type="submit" id="success" class="btn-win" name="completed"></button>
                </form>
            </div>
            <div class="row ml-box pb-3">
                <div class="col">
                    <div style="display: inline-flex;">
                        <img src="/riddle_abp/assets/img/misil-icon.png" height="40px" alt="">
                        <h3 class="text-center ml-2" id="misiles"></h3>
                    </div>
                    <script>setMisiles(tiros);</script>
                </div>
                <div class="col">
                    <button class="btn-kamikaze btn-kamikaze-hover ml-4 float-right" onclick="toggleKamikaze();"></button>
                </div>

            </div>

            <div class="sea mt-1">
                <div class="block"></div>
                <?php
                        for ($i=0; $i < 10; $i++) { 
                            for ($j=0; $j < 10; $j++) { 
                                echo '<button class="box" 
                                            id="'.(($i*10)+$j).'" 
                                            onclick="disparar('.(($i*10)+$j).', barcos_enemigos, campo_enemigo)"
                                            style="top:'.(36.36363636363636*($i+1)).'px; left:'.(36.36363636363636*($j+1)).'px;">
                                    </button>';
                            } 
                        }
                    ?>
                <!-- <button id="ALL">ALL</button>
                    <button id="reset">reset</button>
                    <button id="win">win</button>
                    <button id="lose">lose</button> -->
                <?php
                if(isset($_SESSION['user'])){ 
                    // echo json_encode($_SESSION['user']);
                    if($_SESSION['user']['role'] == 1){
                        echo '<button id="ALL">ALL</button>';
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

            <!-- Modal -->
            <div id="modal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Como jugar?</h5>

                        </div>
                        <div class="modal-body">
                            El siguiente enigma esta basado en el tradicional <b>'Hundir la flota'</b>, aunque lo hemos
                            adaptado a un solo jugador y le hemos añadido mecanicas totalmente originales
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Siguiente</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                $("#modal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                flag();
            </script>

        </div>
    </div>

</div>

</div>

</div>



<script>
    $("#ALL").click(function () {
        all();
    })

    $("#reset").click(function () {
        restart();
    })

    $("#win").click(function () {
        win(true);
    })

    $("#lose").click(function () {
        win(false);
    })
</script>

<?php endblock(); ?>