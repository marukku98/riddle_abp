var cas=[];
var barcos=[];

for (var i = 0; i < 100; i++) {
    cas[i]=({pos:i,barco:false,tocado:false});    
}

cas[0]['barco']=true;
cas[55]['barco']=true;

function a(){
    alert (cas[50]['pos']);
}

function colocarBarco(len){
    var orientacio = Math.round(Math.random());
    var vertical = 0;
    var choca = false;
    var x;
    var y;
    var barco = [];

    do {
        if(orientacio === vertical){
            x = Math.floor(Math.random()*(10-len));
            y = Math.floor(Math.random()*(10));
            for (var i = 0; i < len; i++) {
                if(CheckPos(x+i,y)){
                   choca=true;
                }                
            }
            if(!choca){
                for (var i = 0; i < len; i++) {
                    barco[i]=(x+i)*10+y;
                }               
            }
        }else{
            x = Math.floor(Math.random()*(10));
            y = Math.floor(Math.random()*(10-len));
            for (var i = 0; i < len; i++) {
                if(CheckPos(x,y+i)){
                   choca=true;
                }                
            }
            if(!choca){
                for (var i = 0; i < len; i++) {
                    barco[i]=x*10+(y+i);
                }                
            }
        }
    } while (choca === true);

    return barco;    
}

function disparar(pos) {
    ocultarBoton(pos);
}

function ocultarBoton(pos) {
    if(cas[pos]['barco'] === true){
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "red",
            "height": "25px",
            "width": "25px",
            "transform": "translate(50%,50%)"
        });
    }else{
        $("#" + pos).css({
            "border-radius": "50%",
            "background": "white",
            "height": "25px",
            "width": "25px",
            "transform": "translate(50%,50%)"
        });
    }
}

function CheckPos(x,y){
    var bool = false;
    var pos = x*10+y;
    if(cas[pos]['barco']===true){
        bool = true;
    }
    return bool;
}