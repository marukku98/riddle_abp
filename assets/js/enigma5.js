$(document).ready(function () {
    $(".title").hide();
    $(".reaccionesinmediatas").hide();
    $(".button").hide();

    $(".image").hide();

    $(".title").fadeIn();

    setTimeout(function () {
        $(".title").hide();
        $(".reaccionesinmediatas").fadeIn();
      }, 3000); 
   
    setTimeout(function () {     
        $(".button").show();
      }, 6000); 
   
});	