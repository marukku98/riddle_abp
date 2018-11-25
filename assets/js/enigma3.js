var campo_enemigo = [];
var barcos_enemigos = [];
var hundidos = 0;
var tiros = 70;
var num_kamikazes = 1;
var kamikaze = false;


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

function kamikaze(pos, barcos, campo) {
    var isTocado = false;
    var isHundido = false;
    var casillas = getAround(pos, true);
    casillas[casillas.length] = pos;

    casillas.forEach(function (pos) {
        var tocado = ComprobarTocado(pos, barcos_enemigos);
        ocultarBoton(pos, tocado[0]);
    });
}

function disparar(pos, barcos, campo) {
    if (hundidos < 5 && tiros != 0) {
        tiros--;
        campo[pos]['tocado'] = true;
        var tocado = ComprobarTocado(pos, barcos);
        ocultarBoton(pos, tocado[0]);
        if (tocado[0]) {
            CheckEstadoBarco(tocado[1], barcos, campo);
        }
    }
    else if (tiros == 0) {
        $('#alert-text').text("DERROTA")
        $('#alert').attr('class', 'alert alert-dark w-25 m-auto text-center');
    }
}

function all() {
    for (var x = 0; x < 100; x++) {
        var tocado = ComprobarTocado(x, barcos_enemigos);
        ocultarBoton(x, tocado[0]);
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

function ocultarBoton(pos, tocado) {
    if (tocado) {
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "red",
            "height": "15.909090px",
            "width": "15.909090",
            "transform": "translate(50%,50%)"
        });
        $('#alert-text').text("TOCADO")
        $('#alert').attr('class', 'alert alert-danger w-25 m-auto text-center');

    } else {
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "white",
            "height": "15.909090px",
            "width": "15.909090px",
            "transform": "translate(50%,50%)"
        });
        $('#alert-text').text("AGUA")
        $('#alert').attr('class', 'alert alert-primary w-25 m-auto text-center');
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
            $('#alert-text').text("VICTORIA")
            $('#alert').attr('class', 'alert alert-success w-25 m-auto text-center');
        } else {
            $('#alert-text').text("TOCADO Y HUNDIDO")
            $('#alert').attr('class', 'alert alert-warning w-35 m-auto text-center');
        }
    }
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