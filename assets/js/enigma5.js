var speed = 1000;

$(document).ready(function () {
  $(".title").hide();
  $(".primerTexto").hide();
  $(".segundoTexto").hide();
  $(".tercerTexto").hide();
  $(".cuartoTexto").hide();
  $(".finalTexto").hide();
  $(".about").hide();

  $(".title").fadeIn();

  setTimeout(function () {
    $(".title").fadeOut(speed);
    setTimeout(function () {
      $(".primerTexto").fadeIn(speed);
    }, speed);
  }, 3000);

  setTimeout(function () {
    $(".primerTexto").fadeOut(speed);
    setTimeout(function () {
      $(".segundoTexto").fadeIn(speed)
    }, speed);
  }, 10000);

  setTimeout(function () {
    $(".segundoTexto").fadeOut(speed);
    setTimeout(function () {
      $(".tercerTexto").fadeIn(speed)
    }, speed);
  }, 16000);

  setTimeout(function () {
    $(".tercerTexto").fadeOut(speed);
    setTimeout(function () {
      $(".cuartoTexto").fadeIn(speed)
    }, speed);
  }, 26000);

  setTimeout(function () {
    $(".cuartoTexto").fadeOut(speed);
    setTimeout(function () {
      $(".finalTexto").fadeIn(speed)
      $(".about").fadeIn(0);
    }, speed);
  }, 33000);
  setTimeout(function () {
    $(".about").removeClass("opacity-0");
  }, 36000);

});	