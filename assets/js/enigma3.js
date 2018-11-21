var flota = [
    [1, 2, 3],
    [97, 98, 99]
];

function disparar(pos) {
    ocultarBoton(pos);
    array.forEach(element => {

    });
}

function ocultarBoton(pos) {
    $("#" + pos).css({
        "border-radius": "50%",
        "background": "red",
        "height": "25px",
        "width": "25px",
        "transform": "translate(50%,50%)"
    });
}