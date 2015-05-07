$('.slider-toggle .slider').click(function(){
    $(this).parent('.slider-toggle')
        .toggleClass('left')
        .toggleClass('right');
});
