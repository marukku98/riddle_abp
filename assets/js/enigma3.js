var campo_enemigo = [];
var barcos_enemigos = [];
var hundidos = 0;
var tiros = 35;
var num_kamikazes = 1;
var kamikaze = false;
var victoria = false;


for (var i = 0; i < 100; i++) {
    campo_enemigo[i] = ({ pos: i, ocupado: false, tocado: false });
}

barcos_enemigos[0] = colocarBarco(5, campo_enemigo);
barcos_enemigos[1] = colocarBarco(4, campo_enemigo);
barcos_enemigos[2] = colocarBarco(3, campo_enemigo);
barcos_enemigos[3] = colocarBarco(3, campo_enemigo);
barcos_enemigos[4] = colocarBarco(2, campo_enemigo);

function colocarBarco(len, campo) {
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
                if (CheckPos(x + i, y, campo)) {
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
                if (CheckPos(x, y + i, campo)) {
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
        campo[e]['ocupado'] = true;
        var around = getAround(e, true);
        around.forEach(function (e) {
            campo[e]['ocupado'] = true;
        });
    });

    return barco;
}

function dispararKamikaze(pos, barcos, campo) {
    var isTocado = false;
    var isHundido = false;
    var casillas = getAround(pos, true);
    casillas[casillas.length] = pos;

    casillas.forEach(function (pos) {
        campo[pos]['tocado'] = true;
        var tocado = ComprobarTocado(pos, barcos_enemigos);
        ocultarBoton(pos, tocado[0], true);
        if (tocado[0]) {
            isTocado = true;
            if (CheckEstadoBarco(tocado[1], barcos, campo)) {
                isHundido = true;
            }
        }
    });

    if (isHundido && victoria == false) {
        feedback(2);
    }
    else if (isTocado) {
        feedback(1);
    }
}

function disparar(pos, barcos, campo) {
    if (kamikaze && num_kamikazes != 0) {
        dispararKamikaze(pos, barcos, campo);
        kamikaze = false;
        num_kamikazes--;
        setKamikazes(num_kamikazes);
    }
    else {
        if (hundidos < 5 && tiros != 0) {
            tiros--;
            setMisiles(tiros);
            campo[pos]['tocado'] = true;
            var tocado = ComprobarTocado(pos, barcos);
            ocultarBoton(pos, tocado[0], true);
            if (tocado[0]) {
                CheckEstadoBarco(tocado[1], barcos, campo);
            }
        }
        else if (tiros == 0) {
            feedback(3); //derrota
        }
    }
}

function all() {
    for (var x = 0; x < 100; x++) {
        var tocado = ComprobarTocado(x, barcos_enemigos);
        ocultarBoton(x, tocado[0], false);
    }
}

function ComprobarTocado(pos, barcos) {
    var tocado = [];
    tocado[0] = false;
    var indice = 0;
    barcos.forEach(function (barco) {
        barco.forEach(function (pos_barco) {
            if (pos_barco == pos) {
                tocado[0] = true;
                tocado[1] = indice;
            }
        });
        indice++;
    });
    return tocado;
}

function ocultarBoton(pos, tocado, gif) {
    $("#" + pos).attr("disabled", "disabled");
    var time = 0;
    if (tocado) {
        if (gif) {
            $("#" + pos).css({

                "border": "0px",
                "position": "absolute",
                "height": "40.818181818181px",
                "width": "40.818181818181px",
                "background": "url('https://imgur.com/WhyJUjH.gif?a=" + Math.random() + "')",
                "background-size": "cover",
                "z-index": "2",
                "transform": "translate(-10%,-10%)"
            });
            time = 550;
        }
        var time = setTimeout(function () {
            $("#" + pos).css({
                "border": "1px",
                "border-radius": "50%",
                "background": "red",
                "height": "15.909090px",
                "width": "15.909090",
                "transform": "translate(50%,50%)"
            });
        }, time)

        feedback(1); //tocado

    } else {
        if (gif) {
            $("#" + pos).css({
                "border": "0px",
                "position": "absolute",
                "height": "40.818181818181px",
                "width": "40.818181818181px",
                "background": "url('https://i.imgur.com/mrAAKhA.gif?a=" + Math.random() + "')",
                "background-size": "cover",
                "z-index": "2",
                "transform": "translate(-10%,-10%)"
            });
            time = 550;
        }

        var time = setTimeout(function () {
            $("#" + pos).css({
                "border": "1px",
                "border-radius": "50%",
                "background": "white",
                "height": "15.909090px",
                "width": "15.909090px",
                "transform": "translate(50%,50%)"
            });
        }, time)
        feedback(0); //agua
    }
}

function CheckPos(x, y, campo) {
    try {
        var bool = false;
        var pos = x * 10 + y;
        if (campo[pos]['ocupado'] === true) {
            bool = true;
        }
    } catch (err) {
        alert(err + " / " + pos);
    }
    return bool;
}

function CheckEstadoBarco(num_barco, barcos, campo) {
    var hundido = true;
    barcos[num_barco].forEach(function (pos) {
        if (campo[pos]['tocado'] == false) {
            hundido = false;
        }
    });

    if (hundido) {
        hundidos++;
        if (hundidos == 5) {
            all();
            victoria = true;
            feedback(4);//victoria
        } else {
            feedback(2);//tocado y hundido
        }
    }
    return hundido;
}

function getAround(pos, diagonales) {
    var x = Math.floor(pos / 10);
    var y = pos - (x * 10);
    var around = [];

    if (x != 0) {
        //nord
        around[around.length] = getPos(x - 1, y);
        if (y != 9 && diagonales) {
            //nord-est
            around[around.length] = getPos(x - 1, y + 1);
        }
        if (y != 0 && diagonales) {
            //nord-oest
            around[around.length] = getPos(x - 1, y - 1);
        }
    }

    if (x != 9) {
        //sud
        around[around.length] = getPos(x + 1, y);
        if (y != 9 && diagonales) {
            //sud-est
            around[around.length] = getPos(x + 1, y + 1);
        }
        if (y != 0 && diagonales) {
            //sud-oest
            around[around.length] = getPos(x + 1, y - 1);
        }
    }

    if (y != 9) {
        //est
        around[around.length] = getPos(x, y + 1);
    }
    if (y != 0) {
        //oest
        around[around.length] = getPos(x, y - 1);
    }

    return around;
}

function getPos(x, y) {
    return ((x * 10) + y);
}

/**
 * 0:agua
 * 1:tocado
 * 2:hundido
 * 3:derrota
 * 4:victoria 
 * @param {*} msg 
 */
function feedback(msg) {
    var agua = 0;
    var tocado = 1;
    var hundido = 2;
    var derrota = 3;
    var victoria = 4;

    switch (msg) {
        case tocado:
            $('#alert-text').text("TOCADO")
            $('#alert').attr('class', 'alert alert-danger w-25 m-auto text-center');
            break;

        case hundido:
            $('#alert-text').text("TOCADO Y HUNDIDO")
            $('#alert').attr('class', 'alert alert-warning w-35 m-auto text-center');
            break;

        case derrota:
            $('#alert-text').text("DERROTA")
            $('#alert').attr('class', 'alert alert-dark w-25 m-auto text-center');
            break;

        case victoria:
            $('#alert-text').text("VICTORIA")
            $('#alert').attr('class', 'alert alert-success w-25 m-auto text-center');
            break;

        case agua:
            $('#alert-text').text("AGUA")
            $('#alert').attr('class', 'alert alert-primary w-25 m-auto text-center');
            break;

        default:
            break;
    }
}

function setMisiles(num) {
    $('#misiles').text('Misiles: ' + num )
}

function setKamikazes(num) {
    $('#kamikaes').text('Kamikazes: ' + num );
}

function toggleKamikaze() {
    if (kamikaze) {
        kamikaze = false;
    }
    else {
        kamikaze = true;
    }
}