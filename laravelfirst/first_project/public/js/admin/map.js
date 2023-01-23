if ($('[name=lat]').val() == '' || $('[name=lng]').val() == '') {
    $('#address_block').css('display','none');
} else {
    Onmap($('[name=lat]').val(), $('[name=lng]').val(), 15);
}
