$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function ajaxCount(el) {
    let name = $(el).attr('name');
    var count_field = $(el).parent();
    var change_count = 0;
    var url;
    if ($(el).attr('sign') == "plus") {
        change_count = 1;
        url = "countup";
    } else {
        url = "countdown";
        if (Number($('.count_number', count_field).html()) != 0)
            change_count = -1;
    }
    $('.count_number', count_field).html(Number($('.count_number', count_field).html()) + change_count);
    $.ajax({
        url: url,
        type: "post",
        data: {
            name: name,
        },
    });
}

function trash(el) {
    var fd = (global_fd != 'NULL') ? new FormData(document.getElementById("slideForm")) : new FormData();
    fd.append('define', $('#define').html());
    fd.append('page', $('#page').html());
    fd.append('name', $(el).attr('name'));
    fd.append('title', $(el).attr('title'));
    fd = new URLSearchParams(fd).toString();
    console.log(fd);
    $.ajax({
        url: "trash",
        type: "get",
        data: fd,
        success: function (data) {
            fetch_data($('#page').html());
        },
        error: function (response) {
            console.log(response);
        },
    });
}

$(document).on('click', 'a.page-link', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
});


function submiting(el) {
    event.preventDefault();
    var page = $('#page').html();
    var define = $('#define').html();
    $.ajax({
        url: "create",
        type: "post",
        data: new FormData(el),
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            fetch_data(page);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function submitingUpdate(el) {
    event.preventDefault();
    var fd = new FormData(el);
    fd = new URLSearchParams(fd).toString();
    $.ajax({
        url: "update/",
        type: "get",
        data: fd,
        success: function (response) {
            console.log(response);
            if (response['error'])
                alert(response['error']);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

var global_fd = 'NULL';

function submitingSlider(el) {
    event.preventDefault();
    global_fd = new FormData(el);
    fetch_data($('#page').html());
}

function fetch_data(page) {
    const a = '/admin/fetch/';
    const urls = {
        'Product': a + 'Product',
        'User': a + 'User',
        'Order': a + 'Order',
    };

    var fd = new FormData();
    var define = $('#define').html();
    if (global_fd != 'NULL') {
        fd = new FormData(document.getElementById("slideForm"));
    }
    var url = '/admin/fetch/OnlyTitle';
    if (urls.hasOwnProperty(define)) {
        url = urls[define];
    }
    if (document.getElementById('shop')) {
        define = 'Product';
        url = '/fetch/';
    }
    fd.append('define', define);
    fd.append('page', page);
    fd = new URLSearchParams(fd).toString();
    console.log(fd);
    $.ajax({
        url: url,
        data: fd,
        success: function (data) {
            paginateRender(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}


function paginateRender(data) {
    console.log(data);
    if (!document.getElementById('shop')) {
        $('#title_element').html(data[1]);
    }
    $('#lay_block').html(data[0]);
}

function basked(el) {
    var fd = new FormData();
    fd.append('id', $(el).attr('value'));
    fd = new URLSearchParams(fd).toString();
    var url = ($(el).attr('class') == 'basked_remove') ? "/baskedDelete/" : /basked/;
    $.ajax({
        url: url,
        type: "get",
        data: fd,
        success: function (data) {
            console.log(data);
            var class_name = ($(el).attr('class') == 'basked_remove') ? 'basked_add' : 'basked_remove';
            var html = ($(el).attr('class') == 'basked_remove') ? 'Add to cart' : 'Remove from cart';
            $(el).attr('class', class_name);
            $(el).html(html);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function cart(el) {
    var fd = new FormData();
    fd.append('id', $(el).attr('value'));
    fd = new URLSearchParams(fd).toString();
    $.ajax({
        url: "/baskedDelete/",
        type: "get",
        data: fd,
        success: function (data) {
            console.log(data);
            var total_price = $('#total_price').html();
            var dollar = $('.price', $(el).parent()).html().replace('$', '');
            $('#total_price').html(Number(total_price.replace('$', '')) - Number(dollar) + '$');
            el = $(el).parent();
            el = $(el).parent();
            el = $(el).parent();
            $(el).remove();
            if ($('.product_form').length == 0) {
                window.location.href = "/cart";
            }
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function createOrder() {
    var fd = new FormData();
    if ($('#map').css('display') == 'block') {
        if (lng == undefined || lat == undefined) {
            alert('Set mark on the map for delivery');
            return false;
        } else {
            fd.append('apartment_number', $('[name=apartment_number]').val());
            fd.append('house_number', $('[name=house_number]').val());
            fd.append('lat', lat);
            fd.append('lng', lng);
        }
    }
    fd.append('delivery_date', $('[name=delivery_date]').val());
    fd.append('user_id', $('[name=user_id]').val());
    fd = new URLSearchParams(fd).toString();
    console.log(fd);
    createOrderAjax(fd);
}

function createOrderAjax(fd) {
    $.ajax({
        url: '/orderConfirm',
        type: "get",
        data: fd,
        success: function (data) {
            if (data == 'Set Cookie') {
                window.location = '/thanks';
            }
            console.log(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function changeStatus(el)
{
    var fd = new FormData();
    fd.append('id',$(el).attr('name'));
    fd.append('status',$(el).val());
    fd = new URLSearchParams(fd).toString();
    $.ajax({
        url: '/changeStatus',
        type: "get",
        data: fd,
        success: function (data) {
            window.location = "/admin/Order";
        },
        error: function (response) {
            console.log(response);
        },
    });
}
