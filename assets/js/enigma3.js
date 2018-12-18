var campo_enemigo = [];   //Caselles
var barcos_enemigos = []; //posicions de les barques
var hundidos = 0;         //numero de barques enfonsades
var tiros = 40;           //numero de misils disponibles
var num_kamikazes = 1;    //numero de kamikazes disponibles
var kamikaze = false;     //indicador Kamikaze activat/desactivat
var victoria = false;     //indicador victoria
var intermitente;
var intentos = 0;         //nuemro d'intents 
var english = false;
var flagOn = false;
var load = false;

for (var i = 0; i < 100; i++) {
    campo_enemigo[i] = ({ pos: i, ocupado: false, tocado: false, bandera: false });
}

//Coloquem tots els barcos
barcos_enemigos[0] = colocarBarco(5, campo_enemigo);
barcos_enemigos[1] = colocarBarco(4, campo_enemigo);
barcos_enemigos[2] = colocarBarco(3, campo_enemigo);
barcos_enemigos[3] = colocarBarco(3, campo_enemigo);
barcos_enemigos[4] = colocarBarco(2, campo_enemigo);

/**
 * Coloca un barco de la longitud indicada de manera aleatoria.
 * @param {*} len 
 * @param {*} campo 
 */
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

/**
 * dispara un kamikaze
 * @param {*} pos 
 * @param {*} barcos 
 * @param {*} campo 
 */
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
    $(".btn-kamikaze").addClass("greyscale");
    $(".btn-kamikaze").prop("disabled", true);
    $(".btn-kamikaze-hover").removeClass("btn-kamikaze-hover");

    toggleKamikaze();
    num_kamikazes--;
    setKamikazes(num_kamikazes);
}

/**
 * dispara un misil
 * @param {*} pos 
 * @param {*} barcos 
 * @param {*} campo 
 */
function dispararMisil(pos, barcos, campo) {
    tiros--;
    setMisiles(tiros);
    campo[pos]['tocado'] = true;
    var tocado = ComprobarTocado(pos, barcos);
    ocultarBoton(pos, tocado[0], true);
    if (tocado[0]) {
        CheckEstadoBarco(tocado[1], barcos, campo);
    }
}

/**
 * Dispara en un casella amb el tipus d'arma indicat
 * @param {*} campo 
 * @param {*} pos 
 * @param {*} TipoDisparo 
 */
function disparar(campo, pos, barcos, TipoDisparo) {
    if (hundidos < 5 && tiros != 0) {
        if (campo[pos]['bandera'] == false) {
            TipoDisparo(pos, barcos, campo);
        }
    }
    else if (tiros == 0) {
        all();
        feedback(3); //derrota
    }
}

/**
 * Apunta a una casella y dispara depenent si esta el kamikaze activat o no
 * @param {*} pos 
 * @param {*} barcos 
 * @param {*} campo 
 */
function apuntar(pos, barcos, campo) {
    if (kamikaze && num_kamikazes != 0) {
        disparar(campo, pos, barcos, dispararKamikaze);
    }
    else {
        disparar(campo, pos, barcos, dispararMisil);
    }
}

/**
 * Activa totes les caselles.
 */
function all() {
    for (var x = 0; x < 100; x++) {
        var tocado = ComprobarTocado(x, barcos_enemigos);
        ocultarBoton(x, tocado[0], false);
    }
}

/**
 * Comproba si hem tocat un barco
 * @param {*} pos 
 * @param {*} barcos 
 */
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

/**
 * Canvia l'aspecte d'una casella que ha sigut disparada (també activa un gif)
 * - blanca = aigua
 * - vermella = tocado || tocado y hundido 
 * @param {*} pos 
 * @param {*} tocado 
 * @param {*} gif 
 */
function ocultarBoton(pos, tocado, gif) {
    $("#" + pos).prop('disabled', true);
    var time = 0;
    if (tocado) {
        if (gif) {
            $("#" + pos).addClass("fuego");
            time = 550;
        }
        var time = setTimeout(function () {
            $("#" + pos).removeClass("fuego");
            $("#" + pos).addClass("tocado");
        }, time)

        feedback(1); //tocado

    } else {
        if (gif) {
            $("#" + pos).addClass("agua");
            time = 550;
        }

        var time = setTimeout(function () {
            $("#" + pos).removeClass("agua");
            $("#" + pos).addClass("noTocado");
        }, time)
        feedback(0); //agua
    }
}

/**
 * Comproba si en una posicio hi ha un barco
 * @param {*} x 
 * @param {*} y 
 * @param {*} campo 
 */
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

/**
 * Comproba si hem enfonsat un barco o si hem guanyat
 * @param {*} num_barco 
 * @param {*} barcos 
 * @param {*} campo 
 */
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

/**
 * Retorna les caselles que envoltan la que li pasem per parametre
 * @param {*} pos 
 * @param {*} diagonales si volem tambe les cantonades 
 */
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
 * Feedback d'un tir
 * -1: blank
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

    clearInterval(intermitente);

    switch (msg) {
        case tocado:
            if (english) {
                $('#alert-text').text("HIT");
            }
            else {
                $('#alert-text').text("TOCADO");
            }
            $('#alert-text').css({ "color": "#FF7F50" });
            break;

        case hundido:
            if (english) {
                $('#alert-text').text("HIT & SUNK");
            }
            else {
                $('#alert-text').text("HUNDIDO");
            }
            $('#alert-text').css({ "color": "#B22222" });
            break;

        case derrota:
            win(false);
            break;

        case victoria:
            win(true);
            break;

        case agua:
            if (english) {
                $('#alert-text').text("MISS");
            }
            else {
                $('#alert-text').text("AGUA");
            }
            $('#alert-text').css({ "color": "#1E90FF" });
            break;

        default:
            $('#alert-text').css({ "color": "#00000000" });
            break;
    }
}

/**
 * Activa / Desactiva el feedback del kamikaze.
 * @param {*} active 
 */
function feedbackKamikaze(active) {
    if (active) {
        $('#kamikaze-alert').removeClass('invisible');
        $('#alert').addClass('invisible');
        if (english) {
            $('#kamikaze-text').text("KAMIKAZE READY");
        }
        else {
            $('#kamikaze-text').text("KAMIKAZE ACTIVADO");
        }
        $('#kamikaze-text').css({ "color": "red" });
        setTimeout(function () {
            $('#kamikaze-text').css({ "color": "#00000000" });
        }, 300);
        intermitente = setInterval(function () {
            $('#kamikaze-text').css({ "color": "red" });
            setTimeout(function () {
                $('#kamikaze-text').css({ "color": "#00000000" });
            }, 300);
        }, 600);
    } else {
        $('#kamikaze-alert').addClass('invisible');
        $('#alert').removeClass('invisible');
        clearInterval(intermitente);
        setTimeout(function () {
            $('#kamikaze-text').css({ "color": "#00000000" });
        }, 600);
    }
}

/**
 * actualiza el numero de misils de la pantalla
 * @param {*} num 
 */
function setMisiles(num) {
    $('#misiles').text("  x" + num)
}

/**
 * actualiza el numero de kamikazes de la pantalla
 * @param {*} num 
 */
function setKamikazes(num) {
    $('#kamikaes').text(num);
}

/**
 * Activa / Desactiva el kamikaze.
 * Tant les animacions com la funcionalitat. * 
 */
function toggleKamikaze() {
    if (kamikaze) {
        feedbackKamikaze(false);
        kamikaze = false;
        for (var i = 0; i < 100; i++) {
            $('#' + i).unbind('mouseenter mouseleave')
            $("#" + i).addClass("box-hover");
            $("#" + i).removeClass("bg-kamikaze");
        }
    }
    else {
        feedbackKamikaze(true);
        kamikaze = true;
        for (var i = 0; i < 100; i++) {
            $("#" + i).removeClass("box-hover");
            $('#' + i).hover(
                function () {
                    var id = this.id;
                    var around = getAround(id, true);
                    $("#" + id).addClass("bg-kamikaze");
                    around.forEach(function (id) {
                        $("#" + id).addClass("bg-kamikaze-second");
                    });
                },
                function () {
                    var id = this.id;
                    var around = getAround(id, true);
                    $("#" + id).removeClass("bg-kamikaze");
                    around.forEach(function (id) {
                        $("#" + id).removeClass("bg-kamikaze-second");
                    });
                }
            );
        }
    }
}

/**
 * Comença una nova partida
 */
function restart() {
    intentos++;
    hundidos = 0;
    tiros = 40 + (intentos * 5);
    num_kamikazes = 1;
    kamikaze = false;
    victoria = false;

    setMisiles(tiros);

    $(".end").removeClass("end-on");

    $(".btn-kamikaze").removeClass("greyscale");
    $(".btn-kamikaze").prop("disabled", false);
    $(".btn-kamikaze").addClass("btn-kamikaze-hover");

    for (var i = 0; i < 100; i++) {
        campo_enemigo[i] = ({ pos: i, ocupado: false, tocado: false, bandera: false });
        $('#' + i).prop('disabled', false);
    }

    barcos_enemigos[0] = colocarBarco(5, campo_enemigo);
    barcos_enemigos[1] = colocarBarco(4, campo_enemigo);
    barcos_enemigos[2] = colocarBarco(3, campo_enemigo);
    barcos_enemigos[3] = colocarBarco(3, campo_enemigo);
    barcos_enemigos[4] = colocarBarco(2, campo_enemigo);

    for (var x = 0; x < 10; x++) {
        for (var j = 0; j < 10; j++) {
            $('#' + (x * 10 + j)).attr('style', 'top:' + (36.36363636363636 * (x + 1)) + 'px; left:' + (36.36363636363636 * (j + 1)) + 'px;');
            $('#' + (x * 10 + j)).attr('class', 'box');
        }
    }
}

/**
 * Activa les banderes
 */
function flag() {

    flagOn = true;
    for (var i = 0; i < 100; i++) {
        $('#' + i).contextmenu(function () {
            if (campo_enemigo[this.id]['bandera'] == true) {
                $('#' + this.id).removeClass('flag');
                // $('#' + this.id).prop("disabled", false);
                campo_enemigo[this.id]['bandera'] = false;
            } else {
                $('#' + this.id).addClass('flag');
                // $('#' + this.id).prop("disabled", true);
                campo_enemigo[this.id]['bandera'] = true;
            }
            return false;
        });
    }
}

/**
 * Feedback Victoria/Derrota
 */
function win(win) {
    $(".end").addClass("end-on");
    if (win) {        
        if (english) {
            $(".end-text").text("VICTORY?");
        }
        else {
            $(".end-text").text("VICTORIA?");
        }
        $(".end-text").css({ "color": "#00c400" });
        $(".btn-win").removeClass("invisible");
        $(".btn-lose").addClass("invisible");
    }
    else {
        if (english) {
            $(".end-text").text("DEFEAT");
        }
        else {
            $(".end-text").text("DERROTA");
        }
        $(".end-text").css({ "color": "red" });
        $(".btn-win").addClass("invisible");
        $(".btn-lose").removeClass("invisible");
    }
}

/**
 * Carga el joc i els botons de debug(admin)
 */
function LoadGame() {
    if (!load) {
        load = true;
        $("#ALL").click(function () {
            all();
        })

        $("#reset").click(function () {
            restart();
        })

        $("#win").click(function () {
            win(true);
        })

        $("#lose").click(function () {
            win(false);
        })

        $(".text").hide();
        $(".game").removeAttr('hidden');

        tutorial();

        flag();
    }
}

/**
 * Mostra els modals del tutorial
 */
function tutorial() {
    if (english) {
        $("#modal1en").modal({
            backdrop: 'static',
            keyboard: false,
        });

        $("#modal-btn-1en").click(function () {
            $("#modal2en").modal({
                backdrop: 'static',
                keyboard: false
            });
        });

        $("#modal-btn-2en").click(function () {
            $("#modal3en").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    } else {
        $("#modal1").modal({
            backdrop: 'static',
            keyboard: false,
        });

        $("#modal-btn-1").click(function () {
            $("#modal2").modal({
                backdrop: 'static',
                keyboard: false
            });
        });

        $("#modal-btn-2").click(function () {
            $("#modal3").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    }
}