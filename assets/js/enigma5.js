$(document).ready(function () {
    $(".title").hide();
    $(".primerTexto").hide();
    $(".segundoTexto").hide();
    $(".tercerTexto").hide();
    $(".finalTexto").hide();
    $(".about").hide();
   

    $(".title").fadeIn();

    setTimeout(function () {
        $(".title").hide();
        $(".primerTexto").fadeIn();
      }, 3000); 
   
    setTimeout(function () {     
      $(".primerTexto").hide();
      $(".segundoTexto").fadeIn()
      }, 8000);

    setTimeout(function () {     
      $(".segundoTexto").hide();
      $(".tercerTexto").fadeIn()
      }, 13000);
    
    setTimeout(function () {     
      $(".tercerTexto").hide();
      $(".finalTexto").fadeIn()
      }, 18000);
    setTimeout(function () { 
        $(".about").fadeIn()
    }, 25000); 
   
});	