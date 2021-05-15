jQuery(function ($) {

    $(document).ready(function() {
        setTimeout(function() {
            if( $('.audio__switch').length > 0 ) {
                create_audio_comparison();
            }
        }, 1000);

    });

   const create_audio_comparison = function() {

    var supportsAudio = !!document.createElement('audio').canPlayType;

    if (supportsAudio) {

        // initialize plyr

        var player = new Plyr('#audio-comparison-01', {

            controls: [
                // 'restart',
                'play',
                'progress',
                'current-time',
                'duration',
                'mute',
                'volume',
                // 'download'
            ]

        });

        // initialize playlist and controls
        var index = 0,
            playing = false,
            mediaPath = 'https://studiobricks.com/wp-content/uploads/2021/04/',
            extension = '',

            tracks = [ {
                "track": 1,
                "name": "Outside",
                "duration": "0:08",
                "file": "audio-outside"
            }, {
                "track": 2,
                "name": "Inside",
                "duration": "0:08",
                "file": "audio-inside"

            }],

            buildPlaylist = $.each(tracks, function(key, value) {

                var trackNumber = value.track,
                    trackName = value.name,
                    trackDuration = value.duration;

                if (trackNumber.toString().length === 1) {

                    trackNumber = '0' + trackNumber;

                }

                $('#plList').append(`<li>
                    <div class="plItem">
                        <span class="plNum">${trackNumber}.</span>
                        <span class="plTitle">${trackName}</span>
                        <span class="plLength">${trackDuration}</span>
                    </div>
                </li>`);

            }),

            trackCount = tracks.length,

            audio = $('#audio-comparison-01').on('play', function () {

                playing = true;

            }).on('pause', function () {

                playing = false;

            }).get(0),

            btnPrev = $('.switch').on('click', function () {

                // console.log(index)

                if ( index === 0 ) {

                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }

                } else {

                    audio.pause();
                    index = 0;
                    loadTrack(index);

                }

            }),

            loadTrack = function (id) {

                // $('.plSel').removeClass('plSel');
                // $('#plList li:eq(' + id + ')').addClass('plSel');
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
                // console.log(tracks[id])
                updateDownload(id, audio.src);

            },

            updateDownload = function (id, source) {

                player.on('loadedmetadata', function () {
                    $('a[data-plyr="download"]').attr('href', source);
                });

            },

            playTrack = function (id) {

                loadTrack(id);
                audio.play();

            };

        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';

        loadTrack(index);

    } else {

        // no audio support
        $('.column').addClass('hidden');
        var noSupport = $('#audio-comparison-01').text();
        $('.container').append('<p class="no-support">' + noSupport + '</p>');

    }

   }

});