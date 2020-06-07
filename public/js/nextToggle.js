$('document').ready(function () {
    $('.click').click(function () {
        $(this).next().toggle(500);
    });
});
