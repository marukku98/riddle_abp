function write(id, text, speed) {
    var loop;
    var i = 0;

    loop = setInterval(function () {
        document.getElementById(id).innerHTML += text.charAt(i);
        i++;
        if (i == text.length) {
            clearInterval(loop);
        }
    }, speed)
}
function showText() {
    write("titulo-enunciado", "Pearl Harbor, ", 40);
    setTimeout(function () {
        write("titulo-enunciado", "7 de diciembre de 1941.", 40);
    }, 800);

    setTimeout(function () {
        write("subtitulo-enunciado", "Primera Oleada", 40);
    }, 2200);

    setTimeout(function () {
        write("texto-enunciado",
            "El comandante Mitsuo Fuchida, encargado de dirigir la fuerza aérea, " +
            "te ha encargado planear el ataque contra una flota estadounidense. " +
            "Para conseguir-lo, Fuchida te ha asignado un escuadrón compuesto por " +
            "varios bombarderos Nakajima B5N. " +
            "De entre todos los pilotos de tu escuadrón, uno te ha informado que estaría dispuesto " +
            "a sacrificar su vida para asegurar la victoria (un Kamikaze).", 20
        );
    }, 3000);

    setTimeout(function () {
        write("texto-enunciado2", 
              "Dirigue el ataque con determinación y conduce a nuestro pais a la victoria!", 20);
    }, 11200);

    setTimeout(function () {
        $(".btn-play").removeAttr('hidden');
    }, 11400);
}