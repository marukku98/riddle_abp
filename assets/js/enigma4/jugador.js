// Elements en moviment que poden provocar colisio
var jugador;

// Tecles de moviment
var map = { 32: false, 37: false, 39: false, 38: false, 40: false };

// Funció per a crear un jugador
function createJugador() {
    var div = $("<div id='avio' class='sprite'></div>");
    addElement(div);

    var bottom = (contenidorHeight / 2) - (div.height() / 2);

    jugador = {
        element: createElement(div, 0, bottom),
        recoil: false,
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

                audio.playExplosion();
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

        if (actualPowerup != null) {
            if (checkColision(jugador.element, actualPowerup.element)) {

                usingPowerup = true;

                actualPowerup.powerup.consume();

                actualPowerup.mort();
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