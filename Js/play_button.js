var count = 0;

function playPause(button_id,audio_id){
    var playPauseBT = document.getElementById(button_id);
    var audio = document.getElementById(audio_id);
    if(count == 0){
        count = 1;
        audio.play();
        playPauseBT.innerHTML = "<i class='material-icons'>pause</i>";
    }else{
        count = 0;
        audio.pause();
        playPauseBT.innerHTML = "<i class='material-icons'>play_arrow</i>";
    }
}

function onAudioEnded(button_id)
{
    var playPauseBT = document.getElementById(button_id);
    count = 0;
    playPauseBT.innerHTML = "<i class='material-icons'>play_arrow</i>";
}