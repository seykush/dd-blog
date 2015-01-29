$(document).ready(function () {
    $('.nav.navbar-nav li a').each(function(){
        var href = $(this).attr('href');
        if(! document.location.pathname.indexOf(href) ){
            $(this).parent().addClass('active-menu-item');
        }
    });
});