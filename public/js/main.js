/**
 *
 *
 *responsive menu
 *
 * */
$(document).ready(function(){
    setTimeout(function() {
        $('#alert').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
});
$('#header_icon').click(function (e) {
    e.preventDefault();
    $('body').toggleClass('with--sidebar');
});
$('#site-cache').click(function (e) {
    $('body').removeClass('with--sidebar');
});
/**
 *
 *
 * form focus
 *
 * */
$('.field-input').focus(function () {
    $(this).parent().addClass('is-focused has-label');
});
$('.field-input').blur(function () {
    $parent = $(this).parent();
    if ($(this).val() == '') {
        $parent.removeClass('has-label');
    }
    $parent.removeClass('is-focused');
});
