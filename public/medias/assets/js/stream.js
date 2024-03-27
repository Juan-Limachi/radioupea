var audio = document.getElementById("audio");
var playPauseBTN = document.getElementById("playPauseBTN");
var count = 0;

function playPause() {
    if (count == 0) {
        count = 1;
        audio.play();
        playPauseBTN.innerHTML = "<span id='playPauseText'>Pause&ensp;</span><i id='playPauseIcon' class='fa-solid fa-pause'></i>";

    } else {
        count = 0;
        audio.pause();
        playPauseBTN.innerHTML =
            "<span id='playPauseText'>Play&ensp;</span><i id='playPauseIcon' class='fa-solid fa-play'></i>";
    }
}

function stop() {
    playPause();
    audio.pause();
    audio.currentTime = 0;
    playPauseBTN.innerHTML = "<span id='playPauseText'>Play&ensp;</span><i id='playPauseIcon' class='fa-solid fa-play'></i>";

}
