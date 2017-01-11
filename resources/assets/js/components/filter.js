(function ($) {
    var all_products =$('#container-products');
    $('.radio-custom-category').click(function () {
        var search_input = $(this).attr('value').toLowerCase();


        if ($('.radio-custom-category:checked').length == 0) {
            $('#container-products').show();
            $('#find-box').hide();
        } else {
            $('#container-products').hide();
            $('#find-box').show();
        }
        $('#find-box').empty();
        $('.search-element').each(function (index, element) {
            // margin-top-items-category
            var current_collection = $(element).attr('data-collection').toLowerCase();
            if (current_collection == search_input) {


                $(element).clone().appendTo('#find-box');
            }
        });
        $('#find-box .search-element').each(function (index, element) {
            $(element).find('.margin-top-items-category').removeClass('col-md-6').addClass('col-md-3');
            $(element).find('.thumbnail-small').removeClass('thumbnail-small');
            var has_class = $(element).find('.colors');
            if (!has_class.hasClass('extra-margin-color')) {
                has_class.addClass('extra-margin-color');
            };
        });


    });
})(jQuery)

