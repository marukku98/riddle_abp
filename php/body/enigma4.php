<?php require_once "../templates/master.php" ?>

<?php startblock("css"); ?>
    <link rel="stylesheet" href="/riddle_abp/assets/css/enigma4.css">
    <script src="/riddle_abp/assets/js/enigma4/joc.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/jugador.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/powerup.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/dispar.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/enemic.js"></script>
    <script src="/riddle_abp/assets/js/enigma4/audio.js"></script>
<?php endblock(); ?>

<?php startblock("titulo"); ?> 
    Enigma 4
<?php endblock(); ?>


<?php startblock("principal"); ?>
    <div id="joc">
        <div id="panel">
            <div id="panel-vidas">

            </div>

            <div id="panel-ronda">
                <p>RONDA <span class="numRonda"></span></p>
            </div>

            <div id="panel-powerup">

            </div>

            <div id="panel-score">
                <p>SCORE:
                    <span id="score"></span>
                </p>
            </div>
        </div>
        <div id="explicacio" class="panel-over">
            <h2>Instrucciones</h2>
            <hr>
            <div id="explicacio-jugador">
                <p>Este es tu avión</p>
                <img src="../../assets/img/enigma4/avion-jp.png">

                <p>Y estos son tus enemigos</p>
                <div id="explicacio-avions">
                    <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Curtiss P-40 Warhawk">
                        <img src="../../assets/img/enigma4/AV-1.png">
                    </div>
                    <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Boeing B-17 Flying Fortress">
                        <img src="../../assets/img/enigma4/AV-2.png">
                    </div>
                    <div class="explicacio-avio" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Bell P-63 Kingcobra (Caza)">
                        <img src="../../assets/img/enigma4/AV-3.png">
                    </div>
                </div>

                <p>Utiliza las flechas para mover el avión y el espacio para disparar</p>
                <div>
                    <img src="../../assets/img/enigma4/exp-arrows.png" style="width:80px;">
                    <img src="../../assets/img/enigma4/exp-space.jpg" style="width:180px;">
                </div>

                <p>Durante la partida, saldran ayudas que te haran el juego mas facil</p>
                <div id="explicacio-powerups">
                    <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Doble velocidad">
                        <img class='f-img' src='../../assets/img/enigma4/coffee.png' />
                    </div>
                    <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Menos tiempo de recoil">
                        <img class='f-img' src='../../assets/img/enigma4/recoil.png' />
                    </div>
                    <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Bala gigante">
                        <img class='f-img' src='../../assets/img/enigma4/bala-powerup.png' />
                    </div>
                    <div class="powerup" data-trigger="hover" data-toggle="tooltip" data-placement="top" title="Vida extra">
                        <img class='f-img' src='../../assets/img/enigma4/tools.png' />
                    </div>
                </div>

                <div class="btnBit" onclick="start()">
                    START
                </div>
            </div>
        </div>
        <div id="gameover" class="panel-over panel-over-hidden">
            <h1>GAME OVER</h1>
            <h2>Score: <span id="score-final"></span></h2>
            <div class="btnBit" onclick="start()">
                Try Again?
            </div>
        </div>

        <div id="ronda" class="panel-over panel-over-hidden">
            <h1 id="text-ronda">RONDA <span class="numRonda"></span></h1>
        </div>
    </div>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
<?php endblock(); ?>