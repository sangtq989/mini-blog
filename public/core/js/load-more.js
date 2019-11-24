$(function () {
    $(".post-item-load").slice(0, 3).addClass("d-inline-flex");
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".post-item-load:hidden").slice(0, 1).addClass("d-inline-flex");
        if ($(".post-item-load:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top - 500
        }, 500);
    });
});
