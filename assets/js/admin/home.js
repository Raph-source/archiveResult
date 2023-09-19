$(document).ready(function(){
    let headerHome = $('#header');
    console.log(headerHome );
    headerHome.slideUp(50).slideDown(2000);

    let option = $('#option');
    console.log(option);
    option.fadeOut(0).fadeIn(8000);
});