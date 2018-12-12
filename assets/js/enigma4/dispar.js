var dispars = [];           // Dispars en pantalla

// Interval per a controlar el moviment dels dispars en pantalla
function intervalMovimientoDisparar() {
    return setInterval(function () {
        dispars.map((dispar) => {
            if (dispar.amic) {
                dispar.element.left += speedDispars;
            } else {
                dispar.element.left -= speedDispars;
            }
            dispar.updatePosition();
        });
    }, 10);
}

// Crea un dispar creat per un amic o enemic pasats per parametre
function createDispar(amic, element) {

    var div = $("<div class='sprite " + (amic ? "dispar" + (gigantes ? " gigante" : "") : "dispar-en") + "'></div>");
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
        mort: function (borrar) {
            this.element.mort(function () {
                netejaElement(dispars, dispar);

                dispar.element.div.addClass("explosion-d");
                var audio = new Audio('../../assets/sound/enigma4/explosion-bala.wav');
                audio.play();
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
    var audio = new Audio('../../assets/sound/enigma4/disparo.wav');
    audio.play();
}
