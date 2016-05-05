$(document).ready(function(){
    $('.dropdown').hover(function(){
        $('#map').css('-webkit-filter', 'blur(4px)');
        }, function(){
        $('#map').css('-webkit-filter', 'blur(0px)');
    });
});

$(document).ready(function(){
    $('.dropdown2').hover(function(){
        $('#map').css('-webkit-filter', 'blur(4px)');
        }, function(){
        $('#map').css('-webkit-filter', 'blur(0px)');
    });
});