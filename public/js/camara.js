/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;

var start = document.querySelector('#start'),
        capture = document.querySelector('#capture'),
        canvas = document.querySelector('canvas'),
        ctx = canvas.getContext('2d'),
        video = document.querySelector('video'),
        k = 0,
        MediaStream = "";


start.addEventListener('click', function (e) {
    e.preventDefault();
    $('#imagen-update').val("");
    $('#main-cropper-update').addClass("hide");
    var g = '<div id="photo' + k + '"></div>';
    $('#contenido_foto').html(g);
    $("#video").removeClass("hide");
    $("#start").addClass("hide");
    $("#capture").removeClass("hide");
    navigator.getUserMedia({
        video: true
    }, function (stream) {
        var src = window.URL.createObjectURL(stream);
        video.src = src;
        MediaStream = stream.getTracks()[0];
    }, function (e) {
        console.log(e);
    });

    capture.addEventListener('click', function (e) {
        e.preventDefault();
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        var data = canvas.toDataURL('image/png');
        var basic = $('#photo' + k).croppie({
            enableExif: true,
            url: data,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 400,
                height: 400
            }
        });

        MediaStream.stop();
        $("#contenido_foto").removeClass("hide");
        $("#video").addClass("hide");
        $("#photo").removeClass("hide");
        $("#capture").addClass("hide");
        $("#start").removeClass("hide");
        k = k + 1;
    }, false);
});



