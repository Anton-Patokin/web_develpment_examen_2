// alert("hi my name is anton");

window.slider = require('./jquery-ui.js')
$(function () {
    $("#slider-range").slider({
        range: true,
        min: 8,
        max: 499,
        values: [8, 499],
        slide: function (event, ui) {
            // $( "#amount_1" ).val( "€" + ui.values[ 0 ] );
            $("#amount_1").html('<h3 class="col-md-12 price_number"><span class="pull-left euro-teken">€</span>' + ui.values[0] + '</h3>');
            $("#amount_2").html('<h3 class="col-md-12 price_number"><span class="pull-left euro-teken">€</span>' + ui.values[1] + '</h3>');
            $("#input_amount_1").val(ui.values[0]);
            $("#input_amount_2").val(ui.values[1]);
        }
    });

    $("#amount_1").html('<h3 class="col-md-12 price_number"><span class="pull-left euro-teken">€</span>' + $("#slider-range").slider("values", 0) + '</h3>');
    $("#amount_2").html('<h3 class="col-md-12 price_number"><span class="pull-left euro-teken">€</span>' + $("#slider-range").slider("values", 1) + '</h3>');
    $("#input_amount_1").val($("#slider-range").slider("values", 0));
    $("#input_amount_2").val($("#slider-range").slider("values", 1));

    // $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    //     " - $" + $( "#slider-range" ).slider( "values", 1 ) );


    $('.faq_caret_toggle').click(function () {
        $(this).find('.accordion_click').slideToggle();
        $(this).find('.pull-right').toggleClass('caret-right-white').toggleClass('caret-white');
    })
    

});