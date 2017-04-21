$('#region').chained('#country');
$(document).ready(function () {
    $.backstretch("http://zars.cz/img/bg.jpg");
    $('#jumbotron-carousel').carousel({interval: 10000});
    $('#reviews-carousel').carousel({interval: 15000});

    var url = window.location.href;
    if (url.indexOf('#') > -1) {
        var anchor = url.substring(url.indexOf('#') + 1);
        //                    console.log(anchor);
        $('#link-' + anchor).click();
    }

    $('#carousel-detail-property').on('slid.bs.carousel', function (e) {
        var carouselData = $(this).data('bs.carousel');
        var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.item.active'));
        $('#thumbs-detail-property ul li').removeClass('active');
        $('#thumbs-detail-property ul li[data-slide-to="' + currentIndex + '"]').addClass('active');
    });
    $('#thumbs-detail-property ul li').on('click', function () {
        $('#thumbs-detail-property ul li').removeClass('active');
        $(this).addClass('active');
    });
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
    
    // NEW-DETAIL START
    $('.search-btn').on('click', function () {
        $('.navbar-footer').slideDown(function () {
            var search = $(this).find('input[type=text]');
            $(search).focus();
            $(search).blur(function () {
                $('.navbar-footer').slideUp();
            });
        });
    });
    // NEW-DETAIL END


});

//otevření rezervace
$(document).on('click', '#open-tab5', function (event) {
    $('#tab-tab5').click();
});
//otevření cenik
$(document).on('click', '#open-tab2', function (event) {
    $('#tab-tab2').click();
});
