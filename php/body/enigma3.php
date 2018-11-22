<?php require_once "../templates/master.php" ?>

<?php startblock("css"); ?>
<script src="/riddle_abp/assets/js/enigma3.js"></script>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma3.css">
<?php endblock(); ?>

<?php startblock("titulo"); ?>
Enigma 1
<?php endblock(); ?>

<?php startblock("principal"); ?>

<body>

    <div class="container-fluid">

        <div class="row">
            <div class="m-auto d-inline-flex">

                <div class="sea mt-1">
                    <div class="block"></div>
                    <?php
                for ($i=0; $i < 10; $i++) { 
                    for ($j=0; $j < 10; $j++) { 
                        echo '<button class="box" 
                                      id="'.(($i*10)+$j).'" 
                                      onclick="disparar('.(($i*10)+$j).', barcos_enemigos)"
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
                <div class="sea mt-1">

                </div>
            </div>
            <div class="w-100 mt-3">
                <div id="alert" class="alert alert-primary w-50 m-auto text-center" role="alert">
                    <h2 id="alert-text">-</h2>
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