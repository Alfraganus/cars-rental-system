var navigation = $('.navigation');
$('.menu-toggle').on('click', function () {

    if (navigation.hasClass('opened')) {

        navigation.removeClass('opened').addClass('closed');

    } else {

        navigation.removeClass('closed').addClass('opened');

    }

});

$('.menu-toggle-close').on('click', function () {

    if (navigation.hasClass('opened')) {

        navigation.removeClass('opened').addClass('closed');

    } else {

        navigation.removeClass('closed').addClass('opened');

    }

});

$('.dropify').dropify();
$(document).on('click', '.img-remove-ajax', function (e) {
    e.preventDefault();
    var elem = $(this);
    $.ajax({
        url: elem.data('url'),
        type: 'POST',
        data: {id: elem.data('id')},
        success: function (res) {
            if (res)
                elem.parent('div').remove();
        }
    })
});



$('.dates-cars span:not(.disable)').click(function (e) {

    e.preventDefault();

    $(this).toggleClass('active');

    var date = $(this).data('date');

    var form = $('form.form-extras');

    var old_input = form.find('input[value="' + date + '"]');

    if (old_input.length === 0) {

        var input = '<input type="hidden" name="reserved_dates[]" value="' + $(this).data("date") + '">';

        form.append(input);

    } else {

        old_input.remove();

    }

});

$('.dates span:not(.disable)').click(function (e) {

    e.preventDefault();

    $(this).toggleClass('active');

    var date = $(this).data('date');

    var form = $('form.form-extras');

    var old_input = $('input[value="' + date + '"]');

    if (old_input.length === 0) {

        var input = '<input type="hidden" name="CarOrderForm[reserved_dates][]" value="' + $(this).data("date") + '" class="dates">';

        form.append(input);
        $('.deserved_dates').append(input);

    } else {
        old_input.remove();
    }


    calculateSaleAndTotalPrice();

});

$('#carorderform-car_extras input').change(function () {
    calculateSaleAndTotalPrice();
});


function calculateSaleAndTotalPrice() {

    var price = $('.price').data('price');

    var days = $('.deserved_dates input').length;

    var sales = $('#sales').data('sale');


    var extras = $('#carorderform-car_extras input:checked').siblings('label').find('span');

    var total_price = days * price;

    var sale_amount = 0;


    for (var i = 0; i < extras.length; i++) {

        var value = extras.eq(i);

        var isADay = parseInt(value.data('day'));

        var addPrice = parseInt(value.data('price'));

        if (isADay === 1) {

            total_price += addPrice * days;

        } else {

            total_price += addPrice;

        }

    }

    $('.amount').text(total_price);

    sales = sortByKey(sales);

    $.each(sales, function (key, value) {

        var s_days = parseInt(value[1]);

        if (days >= s_days) {

            var sale_price = total_price - total_price * (100 - value[0]) / 100;

            total_price.toFixed(2);

            $('.sale').text(sale_price.toFixed(2));

            $('.total').text((total_price - sale_price).toFixed(2));

            return false;

        }

    })
}


function readyCalculateSaleAndTotalPrice() {

    var price = $('.price').data('price');

    var days = $('.deserved_dates input').length;

    var sales = JSON.parse($('#sales').attr('data-sale'));


    var extras = $('#carorderform-car_extras input:checked').siblings('label').find('span');

    var total_price = days * price;

    var sale_amount = 0;


    for (var i = 0; i < extras.length; i++) {

        var value = extras.eq(i);

        var isADay = parseInt(value.data('day'));

        var addPrice = parseInt(value.data('price'));

        if (isADay === 1) {

            total_price += addPrice * days;

        } else {

            total_price += addPrice;

        }

    }

    $('.amount').text(total_price);

    sales = sortByKey(sales);

    $.each(sales, function (key, value) {

        var s_days = parseInt(value[1]);

        if (days >= s_days) {

            var sale_price = total_price - total_price * (100 - value[0]) / 100;

            total_price.toFixed(2);

            $('.sale').text(sale_price.toFixed(2));

            $('.total').text((total_price - sale_price).toFixed(2));

            return false;

        }

    })

}

function sortByKey(jsObj) {

    var sortedArray = [];


    // Push each JSON Object entry in array by [key, value]

    for (var i in jsObj) {

        sortedArray.push([parseInt(jsObj[i]), parseInt(i)]);

    }


    // Run native sort function and returns sorted array.
    sortedArray.sort(function(a, b){
        // Compare the 2 dates
        if(a < b) return 1;
        if(a > b) return -1;
        return 0;
    });

    // console.log(sortedArray);

    return sortedArray;

}


$('.xzoom.a, .xzoom-gallery.a').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});

