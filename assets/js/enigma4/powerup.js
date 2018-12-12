var probabilidadPower = 2;     // Probabildad del powerup
var gigantes = false;
var actualPowerup;
var usingPowerup = false;

function intervalCreacionPowerups() {
    return setInterval(function () {
        if (actualPowerup == null && !usingPowerup) {
            var valor = Math.floor(Math.random() * probabilidadPower);

            if (valor == 1) {
                var randPower = Math.floor(Math.random() * 4);

                switch (randPower) {
                    case 0:
                        actualPowerup = createVelocitat(3);
                        break;
                    case 1:
                        actualPowerup = createRecoil(3);
                        break;
                    case 2:
                        if (vidas < 3) {
                            actualPowerup = createVida();
                        }
                        break;
                    case 3:
                        actualPowerup = createBalasGigantes();
                        break;
                    default:
                        alert("No deberias estar aqui.");
                        break;
                }
            }
        }
    }, 5000);
}

function intervalMovimientoPowerup() {
    return setInterval(function () {
        if (actualPowerup != null) {
            actualPowerup.element.left -= speedPowerup;
            actualPowerup.updatePosition();
        }
    }, 10);
}

function createBalasGigantes() {
    var timeout = 10000;

    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/bala-powerup.png' />", timeout, function () {
        gigantes = true;

    }, function () {
        gigantes = false;
    });

    return createPowerUpSprite(powerup);

}

function createVelocitat(multiplicador) {
    var timeout = 10000;
    var antSpeed = speed;

    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/coffee.png' />", timeout, function () {
        speed = speed * multiplicador;

    }, function () {
        speed = antSpeed;
    });

    return createPowerUpSprite(powerup);
}


function createRecoil(divisio) {
    var timeout = 10000;
    var antRecoilTimeout = recoilTimeout;

    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/recoil.png' />", timeout, function () {
        recoilTimeout = recoilTimeout / divisio;

    }, function () {
        recoilTimeout = antRecoilTimeout;
    });

    return createPowerUpSprite(powerup);
}

function createVida() {
    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/tools.png' />", 0, function () {
        vidas++;
        cargaVidas();
    }, function () { });

    return createPowerUpSprite(powerup);
}

function createPowerUpSprite(powerup) {

    var div = $("<div class='powerup sprite'>" + powerup.nombre + "</div>");
    addElement(div);


    var bottom = Math.floor(Math.random() * (contenidorHeight - div.height()));
    var left = contenidorWidth - div.width();

    var powerupSprite = {
        element: createElement(div, left, bottom),
        powerup: powerup,
        updatePosition: function () {
            powerupSprite.element.updatePosition(function () {
                powerupSprite.mort();
            });
        },
        mort: function () {
            powerupSprite.element.mort(function () {
                actualPowerup = null;
            });
        }
    }

    return powerupSprite;
}


function createPowerUp(nombre, timeout, accion, accionFin) {
    var powerup = {
        nombre: nombre,
        timeout: timeout,
        consume: function () {
            accion();

            var powerMuestra = $("<div class='powerup'>" + nombre + "</div>");
            var count = $("<div id='count'></div>");
            var tiempo = timeout / 1000;

            count.html(tiempo);

            $("#panel-powerup").append(powerMuestra);
            $("#panel-powerup").append(count);


            var reloj = setInterval(function () {
                if (usingPowerup) {
                    tiempo--;
                    count.html(tiempo);
                } else {
                    $("#panel-powerup").html("");
                    clearInterval(this);
                }
            }, 1000);

            setTimeout(function () {
                accionFin();
                $("#panel-powerup").html("");
                clearInterval(reloj);
                usingPowerup = false;
            }, timeout);

        }
    };

    return powerup;
}