$(document).ready(function () {
    $(".btnMapa").hide();
    $(".mapa").hide();
    $(".content").hide();
    $("#step").hide();
    $(".planify").hide();
    $(".carta").hide();

    function funcionPrincipal(callback){        
        callback();
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

$("#play").click(function () {
    empezarEnigma('/riddle_abp/assets/img/hawaii3.jpg', 3, true, 1);
    document.getElementById('play').disabled=true;	
});	

$(function () {		
    $('#newPhoto').click(function () {
        $('#levelPanel').show();
        empezarEnigma('/riddle_abp/assets/img/puzzle2Scale.png', 4, false, 2);
        document.getElementById('newPhoto').disabled=true;
    });
});

var contador = 0;
var timer = 15;
var modo;
var num;
var control;

function empezarEnigma(image, gridSize, modo, num){
    if(num == 2){
        $("#timeBox").hide();
    }
     
    var l = document.getElementById("mov");
    l.innerHTML = 0;

    startTime();
    gridPuzzle(image, gridSize);
    $('#panelJuego').fadeIn();
    mezclarPiezas('#puzzGame');
    movimientos('#puzzGame li');    
    this.contador = 0;
    this.modo = modo;
    this.num = num; 
    this.timer = 15;
}

function reinicio(){

    if(timer == -1){  
        $('#puzzGame li').draggable('disable');
        $('#puzzGame li').droppable('disable');  
        mezclarPiezas('#puzzGame');
        movimientos('#puzzGame li');
        this.timer = 15;
    }
}

//Timer conta en rere
function startTime(){
    var l = document.getElementById("number");
    control = window.setInterval(function(){
        if(modo){            
           reinicio();
        }
        if(timer >= 0){
            l.innerHTML = timer;
        }        
        timer--;    
    },1000);
}

function endTime(){
    clearTimeout(control);
}

function gridPuzzle(image, gridSize) {  
    var percentage = 100 / (gridSize - 1);
    $('#puzzGame').empty();
    //Con este for vamos a crear una tabla segun la size
    for (var i = 0; i < gridSize * gridSize; i++) {
        var xpos = (percentage * (i % gridSize)) + '%';
        var ypos = (percentage * Math.floor(i / gridSize)) + '%';
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

function movimientos(elem) {
    //Recogemos la función de arrastrar.
    $(elem).draggable({
        snap: 'true',
        snapMode: 'outer',
        revert: "invalid",
        helper: "clone"
    });

    //Arrastrar y soltar piezas
    $(elem).droppable({
        drop: function (event, ui) {
            var $dragElem = $(ui.draggable).clone().replaceAll(this);
            $(this).replaceAll(ui.draggable); 

            //Recogemos lo que seria el puzzle bien hecho  
            currentList = $('#puzzGame > li').map(function (i, el){ 
                return $(el).attr('data-value'); 
            });

            //Comprobamos despues de cada mov si es correcto o no
            if (completado(currentList)){    
                setTimeout(function(){                   
                    contador = 0;
                    timer = 0;                    
                    if(num == 1){                        
                        animationComplete(true);   
                        setTimeout(function () { 
                            modal = "#correcte";
                            finalAnimation(animation, modal);
                        }, 1000);

                        $('.next').show();                        
                    }else{
                        setCookie('enigma1', 1, 1);
                        setCookie('estacio', 1, 1);
                        animationComplete(true);
                        setTimeout(function () { 
                            modal = "#finalModal";
                            finalAnimation(animation, modal);
                        }, 1000);
                       
                    }
                    endTime();                  
                  });                                      
            }
            else {
                if(num == 1){
                    setTimeout(function(){                    
                        if(contador == 10){                      
                           $("#pistaModal").modal("show");
                        }                       
                      }, 300); 
                }else{
                    setTimeout(function(){                    
                        if(contador == 20){                      
                            $("#pistaModal2").modal("show");
                        }else if(contador == 35){
                            $("#pistaModal3").modal("show");
                        }                       
                      }, 300); 
                }
                contador++;                                        
                $('.movimientos').text(contador);
            }            
            //Le damos las mismas propiedades a las nuevas piezas movidas            
            movimientos(this);
            movimientos($dragElem);
        }
    });
}

function animation(name) {       
    $(name).modal({backdrop: 'static', keyboard: false});; 
    animationQuit(); 
}
  
function finalAnimation(callback, modal) {
    callback(modal);
}

function mezclarPiezas(ul) {    
    var $elems = $(ul).children(),
        $parents = $elems.parent();

    $parents.each(function () {
        $(ul).children().sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).remove().appendTo(ul);
    });

    return ul;
}

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