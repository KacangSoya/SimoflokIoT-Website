$(document).ready(function () {
    $('#detail-wrapper').slideUp();
    $('.loader_wrp').fadeOut();
    $('#dropdown-1').click(function () {
        $('#detail-wrapper').slideToggle();
        $('#plus').toggleClass('hidden');
        $('#minus').toggleClass('hidden');
    })

    $('#sidebarToggle').click(function () {
        $('#dropdown-1').toggleClass('position-relative');
        $('#detail-wrapper').toggleClass('sidebarToggled');
    });
});