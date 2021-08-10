$(document).ready(function () {
    $('.hidden-button').click(function () {
        if ($(this).children().attr('class') === 'fas fa-eye-slash') {
            $(this).children().attr('class', 'fas fa-eye');
            $(this).siblings('input').attr('type', 'text');
        } else {
            $(this).children().attr('class', 'fas fa-eye-slash');
            $(this).siblings('input').attr('type', 'password');
        }
    });
});
