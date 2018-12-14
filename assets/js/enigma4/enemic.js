var limitEnemics;             // Num de enemics a la vegada que hi poden apareixer
var tempsAparicio;          // Segons que triguen en apareixer els avions enemics

var enemics = [];

var intervalCreacionEnemics;

var dificultat = {
    tempsRonda: 30,
    actInterval: null,
    easy() {
        limitEnemics = 5;
        tempsAparicio = 4;

        dificultat.novaDificultat(dificultat.mid, 2);
    },
    mid() {
        limitEnemics = 10;
        tempsAparicio = 3;

        dificultat.novaDificultat(dificultat.hard, 3);
    },
    hard() {
        limitEnemics = 15;
        tempsAparicio = 2;

        dificultat.novaDificultat(dificultat.extra, "4 (HELL)");
    },
    extra() {
        limitEnemics = 20;
        tempsAparicio = 1;

        createIntervalCreacionEnemics();
    },
    novaDificultat(nDificultat, ronda) {
        createIntervalCreacionEnemics();

        setTimeout(function () {
            clearInterval(intervalCreacionEnemics);

            var checked = false;
            actInterval = setInterval(function () {
                if (enemics.length == 0 && !checked && !isStop) {
                    checked = true;
                    clearInterval(this);

                    showRonda(nDificultat, ronda);


                } else if (isStop){
                    clearInterval(this);
                }
            }, 1000);
        }, (this.tempsRonda * 1000));
    },
    clearAllIntervals() {
        clearInterval(this.actInterval);
    }
}

function showRonda(nDificultat, ronda) {
    $(".numRonda").html(ronda);
    $("#ronda").css({ visibility: "visible" });

    setTimeout(function () {
        $("#ronda").css({ visibility: "hidden" });
        nDificultat();
    }, 3500);
}

function setDificultat() {
    tempsRonda = 30;

    showRonda(dificultat.easy, 1);
}



function intervalMovimientoEnemics() {
    return setInterval(function () {
        enemics.map((enemic) => {
            enemic.element.left -= enemic.velocitat;
            enemic.updatePosition();
            enemic.checkColisions();
        });
    }, 10);
}

function createIntervalCreacionEnemics() {

    intervalCreacionEnemics = setInterval(function () {
        if (enemics.length < limitEnemics) {
            var randPower = Math.floor((Math.random() * 3) + 1);

            createEnemicC(randPower);
        }
    }, (tempsAparicio * 1000));
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
                audio.playExplosion();
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
                        if ((this.vidas != 0) && gigantes) this.vidas--;

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