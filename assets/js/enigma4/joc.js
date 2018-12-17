var joc;                        // Contenidor del joc
var contenidorWidth;            // Width del contenidor
var contenidorHeight;           // Height del contenidor
var speed = 1.5;                // Velocitat del jugador
var speedDispars = 4;           // Velocitat de moviment dels dispars
var speedPowerup = 0.8;         // Velocitat dels powerups
var vidas = 3;                  // Numero de vidas del jugador
var score = 0;                  // Score actual del jugador
var recoilTimeout = 500;        // Temps d'espera entre cada dispar
var isStop;                     // Bool que indica si el joc esta parat o començat
var isPhone;                    // Bool que indica si mostrar els control per a mobil

var intervals = [];             // Intervals que ha de parar al acabarse el joc

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
    isStop = false;

    isPhone = $("#isPhone").prop('checked');
    if (isPhone) {
        $("#keyboard").show();
    } else {
        $("#keyboard").hide();
    }

    audio.playButton();

    vidas = 3;
    score = 0;

    audio.playMusica();

    updateScore();
    cargaVidas();

    joc = $("#joc");

    $("#explicacio").hide();
    $("#gameover").hide();

    contenidorWidth = joc.width();
    contenidorHeight = joc.height();

    createJugador();

    intervals.push(intervalCreacionPowerups());

    setDificultat();

    intervals.push(intervalMovimientoEnemics());
    intervals.push(intervalMovimientoDisparar());
    intervals.push(intervalMovimientoPowerup());
}

// Para tots els intervals i mostra la pantalla de game over
function stop() {
    $("#keyboard").hide();
    $("#score-final").html($("#score").html());
    $("#gameover").css({ display: "flex" });
    if (ronda >= 3) {
        setCookie("enigma1", 4, 1);
        setCookie('estacio', 4, 1);
        $("#frmCompleted").css({ display: "flex" });
    }

    isStop = true;
    audio.stopMusica();

    intervals.map((interval) => clearInterval(interval));
    dificultat.clearAllIntervals();
    clearInterval(intervalCreacionEnemics);

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