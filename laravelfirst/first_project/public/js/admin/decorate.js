function inputRadio(el) {
    $('input', el).prop('checked', !$('input', el).prop('checked'));
}

$('.big_list .slider_title').on('click', function () {
    el = $(this).parent();
    el = $('.list', el);
    if (el.css('display') == 'block') {
        el.css('display', 'none');
    } else {
        el.css('display', 'block');
    }
});
