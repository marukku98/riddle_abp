var contador;

function empezarEnigma(image, gridSize){
    gridPuzzle(image, gridSize);
    $('#panelJuego').show();
    mezclarPiezas('#puzzGame');
    movimientos('#puzzGame li');
    contador = 0;
}

function gridPuzzle(image, gridSize) {
    var percentage = 100 / (gridSize - 1);
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
        snap: '#droppable',
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
            currentList = $('#puzzGame > li').map(function (i, el) { return $(el).attr('data-value'); });

            //Comprobamos despues de cada mov si es correcto o no
            if (completado(currentList)){    
                setTimeout(function(){ 
                    //setCookie('enigma1', 1, 3);
                    alert('Correcte!');
                    //$("#finalModal").modal({backdrop: 'static', keyboard: false});                      
                  });                                      
            }
            else {
                setTimeout(function(){   
                    if(contador == 10){
                        $("#pistaModal").modal("show"); 
                    }                       
                  }, 300); 

                contador++;                                        
                $('.movimientos').text(contador);
            }
            //Le damos las mismas propiedades a las nuevas piezas movidas            
            movimientos(this);
            movimientos($dragElem);
        }
    });
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
    for (var i = 0; i < arr.length - 1; i++) {
        if (arr[i] != i){
            return false;
        }
    }
    return true;
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
