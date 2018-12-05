var probabilidadPower = 2;     // Probabildad del powerup
var powerup;
var usingPowerup = false;

function createVelocitat(multiplicador) {

    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/coffee.png' />", 10000, function () {
        var antSpeed = speed;
        speed = speed * multiplicador;

        setTimeout(function () {
            speed = antSpeed;
        }, 10000);

    });

    return createPowerUpSprite(powerup);
}


function createRecoil(divisio) {
    var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/recoil.png' />", 10000, function () {
        var antRecoilTimeout = recoilTimeout;
        recoilTimeout = recoilTimeout / divisio;

        setTimeout(function () {
            recoilTimeout = antRecoilTimeout;
        }, 10000);

    });

    return createPowerUpSprite(powerup);
}

function createVida() {
    if (vidas < 3) {
        var powerup = createPowerUp("<img class='f-img' src='../../assets/img/enigma4/tools.png' />", 0, function () {
            vidas++;
            cargaVidas();

            setTimeout(function () {
            }, 0);

        });

        return createPowerUpSprite(powerup);
    }
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
                powerupSprite.element.mort(function () {
                    powerup = null;
                });
            });
        }
    }

    return powerupSprite;
}


function createPowerUp(nombre, timeout, accion) {
    var powerup = {
        nombre: nombre,
        timeout: timeout,
        consume: function (onEnd) {
            accion();

            var powerMuestra = $("<div class='powerup'>" + nombre + "</div>");
            var count = $("<div id='count'></div>");
            var tiempo = timeout / 1000;

            count.html(tiempo);

            $("#panel-powerup").append(powerMuestra);
            $("#panel-powerup").append(count);


            var reloj = setInterval(function () {
                tiempo--;
                count.html(tiempo);
            }, 1000);

            setTimeout(function () {
                $("#panel-powerup").html("");
                clearInterval(reloj);
                onEnd();
            }, timeout);

        }
    };

    return powerup;
}