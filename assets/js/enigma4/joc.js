var joc;                        // Contenidor del joc
var contenidorWidth;            // Width del contenidor
var contenidorHeight;           // Height del contenidor
var speed = 1.5;                // Velocitat del jugador
var speedDispars = 4;           // Velocitat de moviment dels dispars
var speedPowerup = 0.8;         // Velocitat dels powerups
var vidas = 3;                  // Numero de vidas del jugador
var score = 0;                  // Score actual del jugador
var recoilTimeout = 500;        // Temps d'espera entre cada dispar

var intervals = [];             // Intervals que ha de parar al acabarse el joc
var musica = new Audio('../../assets/sound/enigma4/valk-theme.mp3');

musica.addEventListener('ended', function() {
    this.currentTime = 0;
    this.play();
}, false);

// Carga el div de vides amb el nombre corresponent
function cargaVidas() {
    $("#panel-vidas").html("");
    for (var i = 0; i < vidas; i++) {
        var avio = $("<div class='vida sprite'></div>");
        $("#panel-vidas").append(avio);
    }
}

// Funció principal del codi
function start() {
    var audio = new Audio('../../assets/sound/enigma4/button.ogg');
    audio.play();

    vidas = 3;
    score = 0;

    musica.currentTime = 0;;
    musica.play();

    updateScore();
    cargaVidas();

    joc = $("#joc");

    $("#explicacio").remove();
    $("#gameover").css({ visibility: "hidden" });

    contenidorWidth = joc.width();
    contenidorHeight = joc.height();

    createJugador();

    intervals.push(intervalCreacionEnemics());
    intervals.push(intervalCreacionPowerups());

    intervals.push(intervalMovimientoEnemics());
    intervals.push(intervalMovimientoDisparar());
    intervals.push(intervalMovimientoPowerup());
}

// Para tots els intervals i mostra la pantalla de game over
function stop() {

    musica.pause();

    intervals.map((interval) => clearInterval(interval));

    mataElements(enemics);
    mataElements(dispars);

    if (actualPowerup != null) {
        actualPowerup.mort();
        actualPowerup = null;
    }
    usingPowerup = false;

    intervals = [];
    enemics = [];
    dispars = [];
}


// Funció per a crear un element que es pot moure per la pantalla
function createElement(div, left, bottom) {
    var limiteWidth = contenidorWidth - div.width();
    var limiteHeight = contenidorHeight - div.height();

    var element = {
        div: div,
        left: left,
        bottom: bottom,
        intervals: [],
        updatePosition: function (limits, enemic) {
            if (this.left <= 0) {
                this.left = 0;
                if (limits != null) limits();
            }
            if (this.left >= limiteWidth && !enemic) {
                this.left = limiteWidth;
                if (limits != null) limits();
            }
            if (this.bottom <= 0) this.bottom = 0;
            if (this.bottom >= limiteHeight) this.bottom = limiteHeight;

            this.div.css({ left: this.left + "px", bottom: this.bottom + "px" });
        },
        mort: function (neteja, esperar) {
            neteja();

            esperar = esperar == null ? 0 : esperar;

            setTimeout(function () {
                element.div.remove();
            }, esperar);

            this.intervals.map((interval) => clearInterval(interval));
        },
        show: function () {
            this.div.css({ visibility: "visible" });
        },
        hide: function () {
            this.div.css({ visibility: "hidden" });
        }
    };

    return element;
}

// Funció per a afegir un div al contenidor del joc
function addElement(div) {
    joc.append(div);
}

// Funció per a detectar la colisió entre 2 elements
function checkColision(element1, element2) {
    return !(
        ((element1.bottom + element1.div.height()) < (element2.bottom)) ||
        (element1.bottom > (element2.bottom + element2.div.height())) ||
        ((element1.left + element1.div.width()) < element2.left) ||
        (element1.left > (element2.left + element2.div.width()))
    );
}

// Treu el element del array de actualització corresponent
function netejaElement(array, element) {
    var index = array.indexOf(element);
    if (index > -1) {
        array.splice(index, 1);
    }
}

function mataElements(arrayElements) {
    for (var i = arrayElements.length - 1; i >= 0; i--) {
        arrayElements[i].mort();
    }
}

// Actualitza el text de score amb la puntuació actual
function updateScore() {
    var str = "" + score;
    var pad = "00000000000";
    var ans = pad.substring(0, pad.length - str.length) + str;

    $("#score").html(ans);
}