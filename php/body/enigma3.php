<?php require_once "../templates/master.php" ?>

<script src="/riddle_abp/assets/js/enigma3.js"></script>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma3.css">

<?php startblock("titulo"); ?> Enigma 1
<?php endblock(); ?>

<?php startblock("principal"); ?>

<body>

    <div class="container-fluid">


        <div class="row">
            <div class="sea mt-1">
                <div class="block"></div>
                <?php
                for ($i=0; $i < 10; $i++) { 
                    for ($j=0; $j < 10; $j++) { 
                        echo '<button class="box" 
                                      id="'.(($i*10)+$j).'" 
                                      onclick="disparar('.(($i*10)+$j).')"
                                      style="top:'.(31.8181818*($i+1)).'px; left:'.(31.8181818*($j+1)).'px;">
                              </button>';
                    } 
                }
            ?><button id="ALL">ALL</button>
            </div>
            <div class="sea mt-1"></div>
        </div>
    </div>
    
    </div>

</body>

<script>
$("#ALL").click(function(){
    all();
})
</script>

<?php endblock(); ?>