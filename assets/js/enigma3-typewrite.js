function write(id, text){
    var speed = 40;
    var loop;
    var i = 0;

    loop = setInterval(function(){
        document.getElementById(id).innerHTML += text.charAt(i);
        i++;
        if (i == text.length) {
            clearInterval(loop);            
        }
    },speed)
}
function showText(){
    write("titulo" ,"Pearl Harbor, ");
    setTimeout(function(){
        write("titulo" ,"7 de diciembre de 1941.");
    }, 800);

    setTimeout(function(){
        write("oleada" ,"Primera Oleada");
    }, 2000);
}