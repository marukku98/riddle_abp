var audio = {
    musica: new Audio('../../assets/sound/enigma4/musica.mp3'),
    playMusica() {
        this.musica.volume = 0.8;
        this.musica.play();
    },
    stopMusica(){
        this.musica.pause();
    },
    playExplosion() {
        var audio = new Audio('../../assets/sound/enigma4/explosion.wav');
        audio.volume = 0.3;
        audio.play();
    },
    playDispar() {
        var audio = new Audio('../../assets/sound/enigma4/disparo.wav');
        audio.volume = 0.3;
        audio.play();
    },
    playDisparExplosion() {
        var audio = new Audio('../../assets/sound/enigma4/explosion-bala.wav');
        audio.volume = 0.3;
        audio.play();
    },
    playButton() {
        var audio = new Audio('../../assets/sound/enigma4/button.ogg');
        audio.volume = 0.5;
        audio.play();
    }
}

audio.musica.addEventListener('ended', function () {
    this.currentTime = 0;
    this.play();
}, false);