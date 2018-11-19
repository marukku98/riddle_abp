<?php require_once "../templates/master.php" ?>
<link rel="stylesheet" href="/riddle_abp/assets/css/enigma1.css">

<?php startblock("titulo"); ?>
Enigma 1
<?php endblock(); ?>

<?php startblock("principal"); ?>

<body>

    <div class="total">
        <div class="container first">

            <h3>La guerra de Pear Harbor</h3>

            <p>El ataque a Pearl Harbor fue una ofensiva militar sorpresa efectuada por la Armada Imperial Japonesa
                contra la base naval de los Estados Unidos en Pearl Harbor (Hawái) en la mañana del domingo 7 de
                diciembre de 1941. El ataque pretendía ser una acción preventiva destinada a evitar la intervención de
                la Flota del Pacífico de los Estados Unidos en las acciones militares que el Imperio del Japón estaba
                planeando realizar en el Sureste Asiático contra
                las posesiones ultramarinas del Reino Unido, Francia, Países Bajos y Estados Unidos. </p>

            <h3>Plan de ataque</h3>

            <p>El Almirante Isoroku Yamamoto a causa de una enfermedad no podrá dirigir el ejército de japón contra la
                guerra a EE.UU. Por eso tu, el
                capitán Genda, te ha ordenado liderar el ataque y llevar a Japón a la victoria, todos dependen de ti!</p>

            <p>Esta es la carta que te ha dejado el almirante</p>

            <button class="btn btn-secondary btn-sm carta">Leer carta del almirante</button><br><br>

        </div>


        <div class="container" id="contain" style="display:none;">
            <section id="content">
                <form action="">
                    <h3>Carta del almirante Yamamoto al capitán Genda pidiéndole que estudie la viabilidad de un ataque
                        aéreo a Pearl Harbor.</h3>
                    Febrero de 1941.
                    Dependiendo de los cambios que se produzcan en la situación internacional, podríamos vernos
                    arrastrados a luchar con Estados Unidos. Si Japón y Estados Unidos fueran a la guerra, tendríamos
                    que recurrir a una táctica radical… Deberíamos intentar, con toda la fuerza de nuestras Primera y
                    Segunda Divisiones Aéreas, asestar un golpe a la flota estadounidense en Hawái, de forma, que
                    durante un tiempo, Estados Unidos no pudiera avanzar hacia el Pacífico occidental. Nuestro objetivo
                    sería un grupo de acorazados estadounidenses… No sería fácil llevar a cabo algo así. Pero estoy
                    decidido a darlo todo para realizar este plan, supervisando yo mismo las divisiones aéreas. Me
                    gustaría que investigara pormenorizadamente la viabilidad de un plan de estas características.
                </form>
                <!-- form -->

            </section>
            <!-- content -->
            <button class="btn btn-success bt-sm" id="hide" style="float:right;">Leído</button>
        </div>

        <div class="form-row">
            <div id="uno"><img src="/riddle_abp/assets/img/1speeach1.png" alt="Error" height="300px"></div>

            <div id="2" style="float:right;"><img src="/riddle_abp/assets/img/speeach2.png" alt="Error" height="390px"></div>
        </div>
        <div class="container contBtn">
            <button class="btn btn-info btnMapa">Estudiar mapa</button>
        </div>


    </div>

    <div class="mapa">

        <h3>Mapa de la zona de guerra</h3>
        <p>Resuelve el puzzle del mapa de la isla de Hawaii para poder planificar el ataque!</p>
        <div class="container">
            <span>Pulsa en un cuadro y luego en otro para intercambiar sus posiciones!! El de abajo
                a la derecha siempre
                tiene que quedar vacío!</span>
        </div>
        <button class="btn btn-primary puzzlee">Empezar</button>
        <img id="rompecabezas" src="/riddle_abp/assets/img/hawaiiMap.png" alt="" />
    </div>
    <!-- container -->
</body>

<?php endblock(); ?>

<script type="text/javascript">

    $(document).ready(function () {
        $("#uno").hide();
        $("#2").hide();
        $(".btnMapa").hide();
        $(".mapa").hide();

        $(".carta").click(function () {
            $("#contain").fadeIn(1000); //$("#contain").slideDown(1000);
        });

        $("#hide").click(function () {
            $("#contain").hide(1000);
            $(".first").hide(1000);
            $("#uno").fadeIn();

            var miVar = setInterval(function () { callback2() }, 2000);
            var miVar2 = setInterval(function () { callback3() }, 6000);
        });

        function callback2() {
            $("#2").fadeIn(3000);
        }
        function callback3() {
            $(".btnMapa").show();
        }

        $(".btnMapa").click(function () {            
            $(".total").hide(1000);
            $(".mapa").hide();
            $(".mapa").fadeIn(1000);
        });

    });

</script>