var joc;                        // Contenidor del joc
var contenidorWidth;            // Width del contenidor
var contenidorHeight;           // Height del contenidor
var speed = 1.5;                // Velocitat del jugador
var speedDispars = 4;           // Velocitat de moviment dels dispars
var speedPowerup = 0.8;         // Velocitat dels powerups
var vidas = 3;                  // Numero de vidas del jugador
var score = 0;                  // Score actual del jugador
var recoilTimeout = 500;        // Temps d'espera entre cada dispar
var numEnemics = 5;             // Num de enemics a la vegada que hi poden apareixer
var totalEnemics = 30;          // Total de enemics que pasaran

// Tecles de moviment
var map = { 32: false, 37: false, 39: false, 38: false, 40: false };

// Elements en moviment que poden provocar colisio
var enemics = [];
var dispars = [];
var jugador;

// Carga el div de vides amb el nombre corresponent
function cargaVidas() {
    $("#panel-vidas").html("");
    for (var i = 0; i < vidas; i++) {
        var avio = $("<div class='vida sprite'></div>");
        $("#panel-vidas").append(avio);
    }
}

var intervals = [];

// Funció principal del codi
function start() {
    vidas = 3;
    score = 0;

    updateScore();
    cargaVidas();

    joc = $("#joc");

    $("#explicacio").remove();
    $("#gameover").css({ visibility: "hidden" });

    contenidorWidth = joc.width();
    contenidorHeight = joc.height();

    createJugador();

    var intervarEnemics = setInterval(function () {
        enemics.map((enemic) => {
            enemic.element.left -= enemic.velocitat;
            enemic.updatePosition();
            enemic.checkColisions();
        });
    }, 10);
    intervals.push(intervarEnemics);

    var intervalDispars = setInterval(function () {
        dispars.map((dispar) => {
            if (dispar.amic) {
                dispar.element.left += speedDispars;
            } else {
                dispar.element.left -= speedDispars;
            }

            dispar.updatePosition();
        });
    }, 10);
    intervals.push(intervalDispars);

    var crearPowerup = setInterval(function () {
        if (powerup == null && !usingPowerup) {
            var valor = Math.floor(Math.random() * probabilidadPower);

            if (valor == 1) {
                var randPower = Math.floor(Math.random() * 3);

                switch (randPower) {
                    case 0:
                        powerup = createVelocitat(3);
                        break;
                    case 1:
                        powerup = createRecoil(3);
                        break;
                    case 2:
                        powerup = createVida();
                        break;
                    default:
                        alert("hey");
                        break;
                }
            }
        }
    }, 5000);
    intervals.push(crearPowerup);

    var intervalPowerUps = setInterval(function () {
        if (powerup != null) {
            powerup.element.left -= speedPowerup;
            powerup.updatePosition();
        }
    }, 10);
    intervals.push(intervalPowerUps);

    var intervalCreacio = setInterval(function () {
        if (enemics.length < numEnemics) {
            var randPower = Math.floor((Math.random() * 3) + 1);

            createEnemicC(randPower);
        }
    }, 3000);
    intervals.push(intervalCreacio);
}

function stop() {
    intervals.map((interval) => clearInterval(interval));
    enemics.map((enemic) => enemic.mort());
    dispars.map((dispar) => dispar.mort());
    if (powerup != null) {
        powerup.element.mort(function () { });
        powerup = null;
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

// Funció per a crear un jugador
function createJugador() {
    var div = $("<div id='avio' class='sprite'></div>");
    addElement(div);

    var bottom = (contenidorHeight / 2) - (div.height() / 2);

    jugador = {
        element: createElement(div, 0, bottom),
        recoil: false,
        mort: function mort() {
            jugador.element.mort();
        },
        updatePosition: function () {
            jugador.element.updatePosition();
        },
        restaVida: function () {
            if (vidas > 0) {
                vidas -= 1;
                cargaVidas();
            } else {
                this.mort();
            }
        },
        mort: function () {
            this.element.mort(function () {
                jugador.element.div.addClass("explosion");
            }, 1450);

            setTimeout(function () {
                stop();
                $("#score-final").html($("#score").html());
                $("#gameover").css({ visibility: "visible" });
            }, 2000);
        }
    }

    jugador.updatePosition();

    $(document).keydown(function (event) {
        if (event.keyCode in map) {
            event.preventDefault();

            map[event.keyCode] = true;
        }
    });

    $(document).keyup(function (event) {
        if (event.keyCode in map) {
            event.preventDefault();
            map[event.keyCode] = false;

            jugador.element.div.addClass("normal");
            jugador.element.div.removeClass("up");
            jugador.element.div.removeClass("down");
        }
    });

    var checkKeyboard = function () {
        if (map[32]) {
            // Comproba que ha passat cert temps desde el ultim dispar
            if (!jugador.recoil) {
                createDispar(true, jugador.element);
                jugador.recoil = true;

                setTimeout(function () { jugador.recoil = false; }, recoilTimeout)
            }
        }
        if (map[37]) {
            jugador.element.left -= speed;
        }
        if (map[39]) {
            jugador.element.left += speed;
        }
        if (map[38]) {
            jugador.element.bottom += speed;

            jugador.element.div.removeClass("normal");
            jugador.element.div.addClass("down");
        }
        if (map[40]) {
            jugador.element.bottom -= speed;

            jugador.element.div.removeClass("normal");
            jugador.element.div.addClass("up");
        }
    }

    var checkColisions = function () {
        enemics.map((enemic) => {
            if (checkColision(jugador.element, enemic.element)) {
                enemic.mort();
                jugador.restaVida();
            }
        });

        dispars.map((dispar) => {
            if (!dispar.amic) {
                if (checkColision(jugador.element, dispar.element)) {
                    dispar.mort();
                    jugador.restaVida();
                }
            }
        });

        if (powerup != null) {
            if (checkColision(jugador.element, powerup.element)) {

                usingPowerup = true;

                powerup.powerup.consume(function () {
                    usingPowerup = false;
                });

                powerup.element.mort(function () {
                    powerup = null;
                });
            }
        }
    }

    var actualitzacio = setInterval(function () {
        checkKeyboard();

        jugador.updatePosition()

        checkColisions();

    }, 10);

    jugador.element.intervals.push(actualitzacio);

}

function createEnemicC(categoria) {
    switch (categoria) {
        case 1:
            createEnemic(categoria, 2, 150, 1, false);
            break;
        case 2:
            createEnemic(categoria, 4, 500, 0.8, false);
            break;
        case 3:
            createEnemic(categoria, 1, 300, 15, true);
            break;
        default:
            alert("hey");
            break;
    }
}

// Funció per a crear un enemic
function createEnemic(categoria, vidas, valor, velocitat, warning) {
    var div = $("<div class='enemic-" + categoria + " sprite'></div>");
    var healthbar = $("<div class='healthbar'></div>");
    var restant = $("<div class='healthbar-restante'></div>");

    healthbar.append(restant);
    div.append(healthbar);

    addElement(div);

    var bottom = Math.floor(Math.random() * (contenidorHeight - div.height() - 30));
    // var left = contenidorWidth - div.width();
    var left = contenidorWidth;


    var enemic = {
        element: createElement(div, left, bottom),
        velocitat: velocitat,
        divHealth: restant,
        vidas: vidas,
        totalVidas: vidas,
        valor: valor,
        mort: function () {

            this.divHealth.css({ "width": "0%" });

            this.element.mort(function () {
                netejaElement(enemics, enemic);

                enemic.element.div.addClass("explosion");
            }, 1450);
        },
        updatePosition: function () {
            this.element.updatePosition(function () {
                if (enemic.element.left == 0) {
                    enemic.mort();
                }
            }, true);
        },
        checkColisions: function () {
            dispars.map((dispar) => {
                if (dispar.amic) {
                    if (checkColision(this.element, dispar.element)) {
                        this.vidas--;
                        dispar.mort();

                        var per;
                        per = (this.vidas / this.totalVidas) * 100;
                        this.divHealth.css({ "width": per + "%" });


                        if (this.vidas <= 0) {
                            this.mort();

                            score += this.valor;
                            updateScore();
                        }
                    }
                }
            });
        }
    };

    enemic.element.hide();

    var tocat;
    do {
        tocat = false;

        for (var i = 0; i < enemics.length && !tocat; i++) {
            tocat = checkColision(enemic.element, enemics[i].element);
        }

        if (tocat) {
            enemic.element.bottom = Math.floor(Math.random() * (contenidorHeight - div.height()));
        }

    } while (tocat);

    if (warning) {
        var warning = $("<div class='warning sprite'></div>");
        addElement(warning);
        warning.css({ bottom: enemic.element.bottom + "px", left: (contenidorWidth - warning.width()) + "px" });

        setTimeout(function () {
            warning.remove();

            mostraEnemic(enemic);
        }, 1000);
    } else {
        mostraEnemic(enemic);
    }
}

function mostraEnemic(enemic) {
    enemic.updatePosition();
    enemic.element.show();
    enemics.push(enemic);

    enemic.element.intervals.push(setInterval(function () {
        createDispar(false, enemic.element);
    }, 2000));
}


function createDispar(amic, element) {

    var div = $("<div class='sprite " + (amic ? "dispar" : "dispar-en") + "'></div>");
    addElement(div);

    var bottom = element.bottom + (element.div.height() / 2) - (div.height() / 2);

    if (!amic) {
        var left = element.left - 5;
    } else {
        var left = element.left + element.div.width();
    }

    var dispar = {
        element: createElement(div, left, bottom),
        amic: amic,
        mort: function () {
            this.element.mort(function () {
                netejaElement(dispars, dispar);

                dispar.element.div.addClass("explosion-d");
            }, 1000);
        },
        updatePosition: function () {
            this.element.updatePosition(function () {
                if (dispar.amic) {
                    if ((dispar.element.left + dispar.element.div.width()) == contenidorWidth) {
                        dispar.mort();
                    }
                } else {
                    if ((dispar.element.left) == 0) {
                        dispar.mort();
                    }
                }
            }, false)
        }
    };

    dispar.updatePosition();
    dispars.push(dispar);
}



// Funció per a afegir un div al contenidor del joc
function addElement(div) {
    joc.append(div);
}


// Funció per a detectar la colisió entre 2 elements
function checkColision(jugador, element) {
    return !(
        ((jugador.bottom + jugador.div.height()) < (element.bottom)) ||
        (jugador.bottom > (element.bottom + element.div.height())) ||
        ((jugador.left + jugador.div.width()) < element.left) ||
        (jugador.left > (element.left + element.div.width()))
    );
}

// Treu el element del array de actualització corresponent
function netejaElement(array, element) {
    var index = array.indexOf(element);
    if (index > -1) {
        array.splice(index, 1);
    }
}

// Funció per a dormir el programa X segons
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function updateScore() {
    var str = "" + score;
    var pad = "00000000000";
    var ans = pad.substring(0, pad.length - str.length) + str;

    $("#score").html(ans);
}