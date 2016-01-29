$(document).ready(function(){
    $('.js-google-map')
        .mouseenter(function(){
            $('.gmap').css({
                'height': '400',
                'width': '100%'
            });
        })
        .mouseleave(function(){
            $('.gmap').css({
                'height': '200',
                'width': '50%'
            });
        });


    $('.js-post-ad').on('click', function(e){

    });
});
