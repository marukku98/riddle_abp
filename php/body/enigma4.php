<?php require_once "../templates/master.php" ?>

<?php startblock("css"); ?>
    <link rel="stylesheet" href="/riddle_abp/assets/css/enigma4.css">
    <script src="/riddle_abp/assets/js/enigma4/joc.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/powerup.js"></script>
<?php endblock(); ?>

<?php startblock("titulo"); ?> 
    Enigma 4
<?php endblock(); ?>


<?php startblock("principal"); ?>
    <div id="joc">
        <div id="panel">
            <div id="panel-vidas">

            </div>

            <div id="panel-powerup">

            </div>

            <div id="panel-score">
                <p>SCORE:
                    <span id="score"></span>
                </p>
            </div>
        </div>
        <div id="explicacio">
            <h2>Explicació</h2>
            <hr>
            <div id="explicacio-jugador">
                <p>Tu ets aquest avió</p>
                <img src="../../assets/img/enigma4/avion-jp.png">

                <p>Aquests son els teus enemics</p>
                <div id="explicacio-avions">
                    <div class="explicacio-avio">
                        <img src="../../assets/img/enigma4/A6M.png">
                        <p>A6M</p>
                    </div>
                    <div class="explicacio-avio">
                        <img src="../../assets/img/enigma4/A6M-k.png">
                        <p>A6M (Kamikaze)</p>
                    </div>
                    <div class="explicacio-avio">
                        <img src="../../assets/img/enigma4/N1KJ.png">
                        <p>N1KJ</p>
                    </div>
                </div>

                <p>Utilitza les fletxes per moure el avió i el espai per a disparar</p>
                <div>
                    <img src="../../assets/img/enigma4/exp-arrows.png" style="width:80px;">
                    <img src="../../assets/img/enigma4/exp-space.jpg" style="width:180px;">
                </div>

                <p>Durant la partida apareixeran ajudes que faran el joc mes fàcil</p>
                <div id="explicacio-powerups">
                    <div class="powerup">
                        <img class='f-img' src='../../assets/img/enigma4/coffee.png' />
                    </div>
                    <div class="powerup">
                        <img class='f-img' src='../../assets/img/enigma4/recoil.png' />
                    </div>
                    <div class="powerup">
                        <img class='f-img' src='../../assets/img/enigma4/tools.png' />
                    </div>
                </div>

                <div class="btnBit" onclick="start()">
                    START
                </div>
            </div>
        </div>
        <div id="gameover">
            <h1>GAME OVER</h1>
            <h2>Score: <span id="score-final"></span></h2>
            <div class="btnBit" onclick="start()">
                Try Again?
            </div>
        </div>
    </div>
<?php endblock(); ?>