$(document).ready(function(){
    $('.menu-btn').click(function(){
        $('#nav-menu').toggleClass('menu-open');
        $('#lbl-on').toggle();
        $('#lbl-off').toggle();
        $(this).toggleClass('btn-active');
    });
});