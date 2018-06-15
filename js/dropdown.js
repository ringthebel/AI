$(document).ready(function () {
    $('.dropdown').hover(function () {
        $(this).children('.sub_menu').slideDown();
    },
            function () {
                $(this).children('.sub_menu').slideUp();
            }
    );
});
