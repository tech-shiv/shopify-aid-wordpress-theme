$('.banner-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    centerMode: false,
    infinite: true,
    autoplay: false,
    centerPadding: '0',
    speed: 500,
    loop: true,
    variableWidth: false,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        },
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        },
    }, ],
});

var $root = $('html, body');

$('a[href^="#"]').click(function() {
    var href = $.attr(this, 'href');

    $root.animate({
        scrollTop: $(href).offset().top
    }, 1000, function() {
        window.location.hash = href;
    });

    return false;
});