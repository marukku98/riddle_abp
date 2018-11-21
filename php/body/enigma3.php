<?php require_once "../templates/master.php" ?>

<script src="/riddle_abp/assets/js/enigma3.js"></script>

<?php startblock("titulo"); ?>
Enigma 1
<?php endblock(); ?>

<?php startblock("principal"); ?>
<style>
    .box {
        background-color: #808080;
        position: absolute;
        height: 50px;
        width: 50px;
        border: solid 1px #a5a5a5;
    }

    .box:hover {
        background-color: #a5a5a5;
    }

    .sea {
        position: relative;
        background-size: cover;

        background-image: url("/riddle_abp/assets/img/sea.png");
        height: 550px;
        width: 550px;
    }

    .block {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col6">
                <div class="sea mt-1 mr-1">
                    <div class="block"></div>
                    <?php
                for ($i=0; $i < 10; $i++) { 
                    for ($j=0; $j < 10; $j++) { 
                        echo '<button class="box" 
                                      id="'.(($i*10)+$j).'" 
                                      onclick="disparar('.(($i*10)+$j).')"
                                      style="top:'.(50*($i+1)).'px; left:'.(50*($j+1)).'px;">
                              </button>';
                    } 
                }
            ?>
                </div>
            </div>
            <div class="col6 mt-1 ml-1">
                <div class="sea">

                </div>
            </div>
        </div>
    </div>


</body>

<?php endblock(); ?>