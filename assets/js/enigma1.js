$(document).ready(function () {
    $(".btnMapa").hide();
    $(".mapa").hide();
    $(".content").hide();
    $("#step").hide();
    $(".planify").hide();
    $(".carta").hide();

    function funcionPrincipal(core){        
        core();
    }

    funcionPrincipal(function(){
        setInterval(function () { 
          nextText(); 
        }, 1000); 
    });

    function nextText(){
        $(".planify").fadeIn();
        $(".carta").fadeIn();
    }

    $(".carta").click(function () {
        $("#contain").fadeIn(1000);
        $("#step").show();
    });

    $("#step").click(function () {
        $("#contain").hide(1000);
        $(".first").hide(1000);
        $(".mapa").fadeIn(1000);
    });

    $(".btnMapa").click(function () {
        $(".total").hide(1000);
        $(".mapa").hide();
        $(".mapa").fadeIn(1000);
    });

    $(".puzzlee").click(function () {
        $(".content").fadeIn(1000);
    });

});	

//Función para empezar a resolver el enigma.
$("#play").click(function () {
    empezarEnigma('/riddle_abp/assets/img/hawaii3.jpg', 3, true, 1);
    document.getElementById('play').disabled=true;	
});	

//Función para jugar al siguiente puzzle.
$(function () {		
    $('#newPhoto').click(function () {
        $('#levelPanel').show();
        empezarEnigma('/riddle_abp/assets/img/puzzle2Scale.png', 4, false, 2);
        document.getElementById('newPhoto').disabled=true;
    });
});

//Variables para el juego
var contador = 0;
var timer = 25;
var modo;
var num;
var control;

//Función que inicializa todos los componentes del juego.
function empezarEnigma(image, gridSize, modo, num){
    
    if(num == 2){
        $("#timeBox").hide();
    }
    var l = document.getElementById("mov");
    l.innerHTML = 0;
    
    startTime();//Compte enrere del temps   
    gridPuzzle(image, gridSize);    //Divideix la foto en x parts

    var list = comprobar();

    $('#panelJuego').fadeIn();  //Apareix el puzzle partit
    //Comprovem que s'han mesclat bè
    do{
        list = comprobar();     
        mezclarPiezas('#puzzGame'); //Barrejem les peçes del puzzle
    }while(completado(list));

    movimientos('#puzzGame li');//Abilitem els movimients del puzzle.
    
    //Inicialitzem les variables necessaries
    this.contador = 0;
    this.modo = modo;
    this.num = num; 
    this.timer = 25;
}

 //Mapea los li que tiene el puzzle y obtiene su valor para saber en que posición estan, para saber si el puzzle esta resuelto o no
 //Map --> Convierta todos los elementos de una matriz u objeto en una nueva matriz de elementos.
 // El primer argumento de la función es el elemento de la matriz, el segundo argumento es el índice en la matriz      
function comprobar(){
    var list = $('#puzzGame > li').map(
        function (i, el){ 
            return $(el).attr('data-value'); 
        }
    );
    return list;
}
//Funcion para reiniciar el primer puzzle cuando el contador llegue a cero
function reinicio(){
    if(this.timer <= -1){          
        $('#puzzGame li').draggable('disable');
        $('#puzzGame li').droppable('disable');  
        mezclarPiezas('#puzzGame');
        movimientos('#puzzGame li');        
        this.timer = 25;
    }
}

//Timer conta enrere
function startTime(){
    var l = document.getElementById("number");
    control = window.setInterval(function(){
        if(modo){            
           reinicio();
        }
        if(this.timer >= 0){
            $('#number').css({ 
                "display" : "inline",
                "color": "black" });
            l.innerHTML = this.timer;
        }
        if(this.timer <= 10){                    
            $('#number').css({ 
                "display" : "inline",
                "color": "red" 
            });
            setTimeout(function () {
                $('#number').css({                     
                    "display" : "none",  
                });
            }, 500);              
        }      
        this.timer--;         
    },1000);    
}

//Netejem el contador de temps
function endTime(){
    clearTimeout(control);
}

//Funció per fer la divisio de les peçes
function gridPuzzle(image, gridSize) {  
    var percentage = 100 / (gridSize - 1);
    $('#puzzGame').empty();
    //Con este for vamos a crear una tabla segun la size
    for (var i = 0; i < gridSize * gridSize; i++) {
        //Formula que segons la size, reparteix de forma igual l'espai que ha d'ocupar la peça
        var xpos = (percentage * (i % gridSize)) + '%';
        //Fem aquesta formula que segons la gridSize tindrem cada fila horizontal del mateix valor
        var ypos = (percentage * Math.floor(i / gridSize)) + '%';  
        //Afegim totes les propietats i adjuntem a la llista
        var li = $('<li class="item" data-value="' + (i) + '"></li>').css({ 
            'background-image': 'url(' + image + ')',
            'background-size': (gridSize * 100) + '%',
            'background-position': xpos + ' ' + ypos,
            'width': 400 / gridSize,
            'height': 400 / gridSize
        });
        $('#puzzGame').append(li);
    }
}

//Funcio per moure, arrastrar e intercambiar les peçes.
function movimientos(elem) {
    
    //Possem les propietats
    $(elem).draggable({
        snap: 'true',   //Para que el elmento se ajuste a los otros que se puedan arrastrar de manera instantanea
        snapMode: 'outer', //Determina a los bordes de los elementos snap los elementos arrastrables se ajustarán
        revert: "invalid", //Si el elemento debe volver a su posición inicial cuando se detiene el arrastre. revertir solo se producirá si el elemento arrastrable no se ha soltado en un dropable. Para "valid", es al revés. 
        helper: "clone" //Permite utilizar un elemento auxiliar para arrastrar la pantalla.
    });

    //Arrastrar y soltar piezas
    //Se desencadena cuando se suelta un elemento arrastrable aceptado en el dropable.
    $(elem).droppable({
        drop: function (event, ui) {
            //ui.draggable --> Un objecte jQuery que representa el element per arrastrar
            //this --> li.item
            //replaceAll --> Podemos ver que el elemento seleccionado reemplaza al objetivo al ser movido desde su ubicación anterior, no al ser clonado.
            var $dragElem = $(ui.draggable).clone().replaceAll(this);
            $(this).replaceAll(ui.draggable); 

            currentList = comprobar();

            //Comprobamos despues de cada mov si es correcto o no
            if (completado(currentList)){                  
                setTimeout(function(){                   
                    contador = 0;
                    this.timer = 0; 
                    //Diferenciamos si es el primer o segundo puzzle.
                    //Hacemos una animación, la quitamos y mostramos un modal u otro dependiendo del puzzle en que esté                  
                    if(num == 1){                        
                        animationComplete(true);   
                        setTimeout(function () { 
                            modal = "#correcte";
                            finalAnimation(animation, modal);
                        }, 1000);

                        $('.next').show();                        
                    }else{  
                        animationComplete(true);
                        setTimeout(function () { 
                            modal = "#finalModal";
                            finalAnimation(animation, modal);
                        }, 1000);                       
                    }
                    endTime();                  
                  });                                      
            }
            //Si no lo a completado...
            else {
                //Si se encuentra en el primer puzzle y ha hecho 10 movimientos se le da una pista
                if(num == 1){
                    setTimeout(function(){                    
                        if(contador == 10){                      
                           $("#pistaModal").modal("show");
                        }                       
                      }, 300); 
                }//Si se encuentra en el segundo puzzle y ha hecho 20 / 35 movimientos se le da otra pista
                else{
                    setTimeout(function(){                    
                        if(contador == 10){                      
                            $("#pistaModal2").modal("show");
                        }else if(contador == 25){
                            $("#pistaModal3").modal("show");
                        }                       
                      }, 300); 
                }
                //Sumamos y mostramos el contador de movimientos
                contador++;                                        
                $('.movimientos').text(contador);
            }            
            //Le damos las mismas propiedades a las nuevas piezas movidas, porque al ser movidos, se necesita darles la propeidad de nuevo            
            movimientos(this);
            movimientos($dragElem);
        }
    });
}

//Funciones para mostrar el modal y quitar la animacion una vez resuelto el puzzle
function animation(name) {       
    $(name).modal({backdrop: 'static', keyboard: false});; 
    animationQuit(); 
}
  
function finalAnimation(callback, modal) {
    callback(modal);
}

//Mezclamos las diferentes piezas del puzzle
function mezclarPiezas(ul) {  

    var $ul =  $(ul).children();
    //children ->  Obtenga los elementos secundarios de cada elemento en el conjunto de elementos emparejados, opcionalmente filtrados por un selector.
    //parent -> obtenga el elemento primario de cada elemento en el conjunto actual de elementos coincidentes, opcionalmente filtrado por un selector.
    
    //Comença a agafar cada element i el reordena
    $ul.each(function () {
        //De cada ul fa un sort random y elimina la posicio que estava
        $ul.sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).remove().appendTo(ul);
    });

    return ul;
}

//Comprobamos si el puzzle esta completado
function completado(arr) {
    var i = -1;
    for (var elem in arr) {
        i++;
        if(arr[elem] != i && i < arr.length -1){            
            return false;
        }
      }
    return true;
}

//Mostramos la animacion
function animationComplete(animation){
    if (animation) {
        $(".gif").css({
            "top": "0",
            "z-index": "20",
            "position": "absolute",
            "height": "100%",
            "width": "100%",
            "background": "url('/riddle_abp/assets/img/lvl-complete.gif?a=" + Math.random() + "')"    
        });    
    }
}

//Ocultamos la animacion
function animationQuit(){
    $(".gif").css({
        "top": "0",
        "z-index": "-2",
        "position": "absolute",
        "height": "100%",
        "width": "100%",
        "background": "url('/riddle_abp/assets/img/lvl-complete.gif?a=" + Math.random() + "')"    
    });   
}