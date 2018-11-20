var imagePuzzle = {
    stepCount: 0,
    startGame: function (images, gridSize) {
        this.setImage(images, gridSize);
        $('#playPanel').show();
        $('#sortable').randomize();
        this.enableSwapping('#sortable li');
        this.stepCount = 0;
    },
    
    enableSwapping: function (elem) {
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

                setTimeout(function(){   
                    if(imagePuzzle.stepCount == 10){
                        // alert("La rosa de los vientos tiene que quedar abajo a la izquierda del mapa");
                        $("#pistaModal").modal("show"); 
                    }                       
                  }, 500);     

                //Recogemos lo que seria el puzzle bien hecho
                currentList = $('#sortable > li').map(function (i, el) { return $(el).attr('data-value'); });

                //Comprobamos despues de cada mov si es correcto o no
                if (isSorted(currentList)){    
                    setTimeout(function(){                        
                        // alert("Completado!!");
                        $("#finalModal").modal("show");                      
                      },500);
                      
                    //Desactivamos funciones(?)

                    //Enviamos a la BD que el nivel 1 ha sido completado
                }
                else {
                    imagePuzzle.stepCount++;                                        
                    $('.stepCount').text(imagePuzzle.stepCount);
                }
                //Le damos las mismas propiedades a las nuevas piezas movidas
                imagePuzzle.enableSwapping(this);
                imagePuzzle.enableSwapping($dragElem);
            }
        });
    },

    //Haciendo la grid de partición
    setImage: function (images, gridSize) {
        var percentage = 100 / (gridSize - 1);
        var image = images[0];
        $('#imgTitle').html(image.title);
        $('#actualImage').attr('src', image.src);

        //Con este for vamos a crear una tabla segun la size
        for (var i = 0; i < gridSize * gridSize; i++) {
            var xpos = (percentage * (i % gridSize)) + '%';
            var ypos = (percentage * Math.floor(i / gridSize)) + '%';
            var li = $('<li class="item" data-value="' + (i) + '"></li>').css({
                'background-image': 'url(' + image.src + ')',
                'background-size': (gridSize * 100) + '%',
                'background-position': xpos + ' ' + ypos,
                'width': 400 / gridSize,
                'height': 400 / gridSize
            });
            $('#sortable').append(li);
        }
    }
};

//Comprobar si está ordenado
function isSorted(arr) {
    for (var i = 0; i < arr.length - 1; i++) {
        if (arr[i] != i){
            return false;
        }
    }
    return true;
}

//Mezclar las piezas del puzzle
$.fn.randomize = function (selector) {
    var $elems = selector ? $(this).find(selector) : $(this).children(),
        $parents = $elems.parent();

    $parents.each(function () {
        $(this).children(selector).sort(function () {
            return Math.round(Math.random()) - 0.5;
        }).remove().appendTo(this);
    });

    return this;
};