/**
 * Created by MacBookEr on 2/19/15.
 */
$( document ).ready(function() {

    //start timeout function
    setTimeout(function()
    {
        $('#myCarousel').carousel({
            interval: 2500
        });

        $('.carousel .item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length>0) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    }, 4200);

});