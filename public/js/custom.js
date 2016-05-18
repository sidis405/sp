$(document).ready(function(){
    $('.post-img').find('img').hover(function() {
        $(this).addClass('transition');
    
    }, function() {
        $(this).removeClass('transition');
    });
});