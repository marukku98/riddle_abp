<?php require_once "../templates/master.php" ?>

<?php startblock("css"); ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma3.css">
<script src="/riddle_abp/assets/js/enigma3.js"></script>
<?php endblock(); ?>

<?php startblock("titulo"); ?> Enigma 3
<?php endblock(); ?>

<?php startblock("principal"); ?>

<body>

    <div class="container-fluid">

        <div class="row">
            <div class="m-auto">
                <div id="misiles"></div>
                <script>setMisiles(tiros);</script>
                <div id="kamikaes"></div>
                <script>setKamikazes(num_kamikazes);</script>

                <button class="btn-kamikaze" onclick="toggleKamikaze();"></button>
                <div class="sea mt-1">
                    <div class="block"></div>
                    <?php
                        for ($i=0; $i < 10; $i++) { 
                            for ($j=0; $j < 10; $j++) { 
                                echo '<button class="box" 
                                            id="'.(($i*10)+$j).'" 
                                            onclick="disparar('.(($i*10)+$j).', barcos_enemigos, campo_enemigo)"
                                            style="top:'.(31.8181818*($i+1)).'px; left:'.(31.8181818*($j+1)).'px;">
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

            </div>
        </div>
        <div class="row mt-3" style="margin-left: 30px;">
            <div id="alert" class="alert alert-primary m-auto text-center" role="alert">
                <h3 id="alert-text" style="font-size:2vw;">-</h3>
            </div>
        </div>
    </div>

    </div>

    </div>

</body>

<script>
    $("#ALL").click(function () {
        all();
    })
</script>

<?php endblock(); ?>