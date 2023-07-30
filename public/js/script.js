console.log('trongnay');
(function($) {
    'use strict';
    // headroom js
    $('.navigation').headroom();

    // Background-images
    $('[data-background]').each(function() {
        $(this).css({
            'background-image': 'url(' + $(this).data('background') + ')'
        });
    });

    $('.featured-post-slider').slick({
        dots: false,
        speed: 300,
        autoplay: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
    // Masonry
    $(document).ready(function() {
        $('.masonry-container').masonry({
            itemSelector: '.masonry-container > div',
            columnWidth: 1
        });
    });
    // article reading time
    // $('article').each(function() {

    //     let _this = $(this);

    //     _this.readingTime({
    //         readingTimeTarget: _this.find('.eta'),
    //         remotePath: _this.attr('data-file'),
    //         remoteTarget: _this.attr('data-target')
    //     });
    // });
    //Get the button
    // Hover effect
    // let moveLeft = 20;
    // let moveDown = 10;
 
    // $('a.trigger').hover(function(e) {
    //     $('div#info-story').show();
    //   //.css('top', e.pageY + moveDown)
    //   //.css('left', e.pageX + moveLeft)
    //   //.appendTo('body');
    //   console.log($('div#info-story').show());
    // }, function() {
    //     $('div#info-story').hide();
    // });
 
    // $('a.trigger').mousemove(function(e) {
    //     $("div#info-story").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
    // });
})(jQuery);
