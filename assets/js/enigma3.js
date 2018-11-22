var cas = [];
var barcos = [];

for (var i = 0; i < 100; i++) {
    cas[i] = ({ pos: i, barco: false, tocado: false });
}

barcos[0] = colocarBarco(5);
barcos[1] = colocarBarco(4);
barcos[2] = colocarBarco(3);
barcos[3] = colocarBarco(3);
barcos[4] = colocarBarco(2);


function a() {
    alert(cas[50]['pos']);
}

function colocarBarco(len) {
    var orientacio;
    var vertical = 0;
    var choca;
    var x;
    var y;
    var barco = [];
    var ran = 10 - len;

    do {
        orientacio = Math.round(Math.random());
        choca = false;
        if (orientacio === vertical) {
            x = Math.floor(Math.random() * ran);
            y = Math.floor(Math.random() * 10);
            for (var i = 0; i < len; i++) {
                if (CheckPos(x + i, y)) {
                    choca = true;
                }
            }
            if (!choca) {
                for (var i = 0; i < len; i++) {
                    barco[i] = ((x + i) * 10) + y;
                }
            }
        } else {
            x = Math.floor(Math.random() * 10);
            y = Math.floor(Math.random() * ran);
            for (var i = 0; i < len; i++) {
                if (CheckPos(x, y + i)) {
                    choca = true;
                }
            }
            if (!choca) {
                for (var i = 0; i < len; i++) {
                    barco[i] = (x * 10) + (y + i);
                }
            }
        }
    } while (choca === true);

    barco.forEach(function (e) {
        cas[e]['barco'] = true;
    });

    return barco;
}

function disparar(pos) {
    ocultarBoton(pos);
}

function all() {
    for (var x = 0; x < 100; x++) {
        ocultarBoton(x);
    }
}

function ocultarBoton(pos) {
    if (cas[pos]['barco'] === true) {
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "red",
            "height": "15.909090px",
            "width": "15.909090",
            "transform": "translate(50%,50%)"
        });
    } else {
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "white",
            "height": "15.909090px",
            "width": "15.909090px",
            "transform": "translate(50%,50%)"
        });
    }
}

function CheckPos(x, y) {
    try {
        var bool = false;
        var pos = x * 10 + y;
        if (cas[pos]['barco'] === true) {
            bool = true;
        }
    } catch (err) {
        alert(err + " / " + pos);
    }
    return bool;
}