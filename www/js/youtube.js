var youTubePlayer;
var ended = false;

function onYouTubeIframeAPIReady() {
    'use strict';
    var youTubePlayerVolumeItemId = 'YouTube-player-volume';


    function onError(event) {
        youTubePlayer.personalPlayer.errors.push(event.data);
    }

    function onReady(event) {
        var player = event.target;

        player.pauseVideo();
    }

    function onStateChange(event) {
        var volume = Math.round(event.target.getVolume());
        var volumeItem = document.getElementById(youTubePlayerVolumeItemId);

        if (volumeItem && (Math.round(volumeItem.value) != volume)) {
            volumeItem.value = volume;
        }
    }

    youTubePlayer = new YT.Player('lesson-view',
        {
            playerVars: {
                'autohide': 0,
                'cc_load_policy': 0,
                'controls': 2,
                'disablekb': 1,
                'iv_load_policy': 3,
                'modestbranding': 1,
                'rel': 0,
                'showinfo': 0,
                'start': 3
            },
            events: {
                'onError': onError,
                'onReady': onReady,
                'onStateChange': onStateChange
            }
        });

    youTubePlayer.personalPlayer = {
        'currentTimeSliding': false,
        'errors': []
    };
}

function youTubePlayerActive() {
    'use strict';
    return youTubePlayer && youTubePlayer.hasOwnProperty('getPlayerState');
}

function youTubePlayerCurrentTimeChange(currentTime) {
    'use strict';
    youTubePlayer.personalPlayer.currentTimeSliding = false;
    if (youTubePlayerActive()) {
        youTubePlayer.seekTo(currentTime * youTubePlayer.getDuration() / 100, true);
    }
}

function youTubePlayerSeek(time) {
    youTubePlayer.personalPlayer.currentTimeSliding = false;
    var current = youTubePlayer.getCurrentTime();
    var duration = youTubePlayer.getDuration()

    var toTime = current - time;

    if (toTime) {
        if (youTubePlayerActive()) {
            youTubePlayer.seekTo(current - time, true);
        }
    }

}

function youTubePlayerPrevious(number) {
    var current = youTubePlayer.getCurrentTime();
    if (number) {
        if (youTubePlayerActive()) {
            youTubePlayer.seekTo((current - number));
        }
    }
}

function youTubePlayerNext(number) {
    var current = youTubePlayer.getCurrentTime();
    var duration = youTubePlayer.getDuration()

    if (number) {
        if (youTubePlayerActive()) {
            youTubePlayer.seekTo((current + number));
        }
    }
}

function youTubePlayerDisplayInfos() {
    'use strict';

    if ((this.nbCalls === undefined) || (this.nbCalls >= 3)) {
        this.nbCalls = 0;
    }
    else {
        ++this.nbCalls;
    }
    if (youTubePlayerActive()) {
        var state = youTubePlayer.getPlayerState();

        var current = youTubePlayer.getCurrentTime();
        var duration = youTubePlayer.getDuration();
        var currentPercent = (current && duration ? current * 100 / duration : 0);
        if (!youTubePlayer.personalPlayer.currentTimeSliding) {
            document.getElementById('YouTube-player-progress').style.width = currentPercent+'%';
        }
        if (youTubePlayerStateValueToDescription(state) == 'ended' && ended == false) {
            ended = true;
            addCertificateToViews(obj_merged)
        }

    }
}

function youTubePlayerPause() {
    'use strict';

    if (youTubePlayerActive()) {
        youTubePlayer.pauseVideo();
    }
}

function youTubePlayerPlay() {
    'use strict';

    if (youTubePlayerActive()) {
        youTubePlayer.playVideo();
    }
}

function youTubePlayerStateValueToDescription(state, unknow) {
    'use strict';

    var STATES = {
        '-1': 'unstarted',   // YT.PlayerState.
        '0': 'ended',        // YT.PlayerState.ENDED
        '1': 'playing',      // YT.PlayerState.PLAYING
        '2': 'paused',       // YT.PlayerState.PAUSED
        '3': 'buffering',    // YT.PlayerState.BUFFERING
        '5': 'video cued'
    };  // YT.PlayerState.CUED

    return (state in STATES
        ? STATES[state]
        : unknow);
}

function youTubePlayerStop() {
    'use strict';

    if (youTubePlayerActive()) {
        youTubePlayer.stopVideo();
        youTubePlayer.clearVideo();
    }
}

(function () {
    'use strict';

    function init() {
        var tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        var first_script_tag = document.getElementsByTagName('script')[0];
        first_script_tag.parentNode.insertBefore(tag, first_script_tag);
        setInterval(youTubePlayerDisplayInfos, 1000);
    }

    if (window.addEventListener) {
        window.addEventListener('load', init);
    } else if (window.attachEvent) {
        window.attachEvent('onload', init);
    }
}());