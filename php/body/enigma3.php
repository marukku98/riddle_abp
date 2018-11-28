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
            <div class="row ml-box">
                <div class="col">
                    <div>
                        <h5 class="text-center">Misiles</h5>
                        <h3 class="text-center" id="misiles"></h3>
                    </div>
                    <script>setMisiles(tiros);</script>
                </div>
                <div class="col">
                    <button class="btn-kamikaze ml-4 float-right" onclick="toggleKamikaze();"></button>
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
                <button id="ALL">ALL</button>
                <?php
                if(isset($_SESSION['user'])){ 
                    if($_SESSION['user']['rol'] == 1){
                        echo '<button id="ALL">ALL</button>';
                    }
                }
            ?>
            </div>
            <div class="row mt-3 ml-box" style="margin-left: 30px;">
                <div id="alert m-auto" class="m-auto">
                    <h1 id="alert-text" class="title-font">.</h1>
                </div>
            </div>

        </div>
    </div>

</div>

</div>

</div>



<script>
    $("#ALL").click(function () {
        all();
    })
</script>

<?php endblock(); ?>