require('./bootstrap');

// require('/faq_api');
require('./components/custom.js');
(function ($) {
    $(document).ready(function () {
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/public/';



        $('#advanced_filter').click(function () {
            console.log('okey');
            $('.filter-elemnts').slideToggle();
            $('#advanced_filter').find('span:first').toggleClass('caret');
            $('#advanced_filter').find('span:first').toggleClass('caret-right');
        });


        $('.search_box').click(function () {
            search_content = $(this).html();
            $(this).html('');
            $("#search_input").keypress(function (e) {

                if (e.keyCode == 13) {
                    e.preventDefault();
                    if($(this).html()!=""){
                        $('#search_word').val($(this).html());
                        $("#target").submit();
                    }
// $(this).html(search_content);
                }
            });
            console.log(search_content);
        })



        var search_content;
        $('.faq_search_box').click(function () {
            search_content = $(this).html();
            $(this).html('');
            $("#search_input").keypress(function (e) {
                if (e.keyCode == 13) {

                    $("#search_input").blur();
                    e.preventDefault();
                    if($(this).html()!=""){
                        window.location.replace(baseUrl + "/search/faq/" + $(this).html());
                    }
// $(this).html(search_content);
                }
            });
            console.log(search_content);
        })

        $('.clear_button').click(function () {
            $('#search_input').html('');

        })

        // $('.white-background').hide();
        $('.x-close').click(function () {
            $('.white-background').hide();
            remove_active_clas();
        })

        // $('.white-background-click').click(function (event) {
        //     // event.preventDefault();
        //     remove_active_clas();
        //     $('.' + event.target.id).addClass('active')
        //
        //     $('.white-background').show();
        // })

        function remove_active_clas() {
            $('.faq').removeClass('active');
            $('.search').removeClass('active');
        }


        $('.nav-hide').hide();
        $('.pagination-items-right').click(function () {
            console.log('click-rigth');
            $('#item-carousel').animate({'scrollLeft': '+=1000px'}, "slow");
        });
        $('.pagination-items-left').click(function () {
            console.log('click-left');
            $('#item-carousel').animate({'scrollLeft': '-=1000px'}, "slow");
        });

        $('.img-background').mouseover(function () {
            $(this).find('.image2').show();
        })
        $('.img-background').mouseleave(function () {
            $(this).find('.image2').hide();
        })


        $('.img-small').click(function () {
            $('.img-small').addClass('on-active');
            var url = $(this).attr('id');
            $(this).removeClass('on-active');

            $('#img-big').attr('src', baseUrl + '/images/items/big/' + url);
        })


        $('.exit-cookie').click(function () {

            $('.cookie').hide();
        })

        $('.thumbnail-custom').mouseenter(function () {

            $(this).find('a:first').addClass('img-hover');
            $(this).find('p:first').addClass('img-hover-text-hover');
        });
        $('.thumbnail-custom').mouseleave(function () {
            $(this).find('a:first').removeClass('img-hover');
            $(this).find('p:first').removeClass('img-hover-text-hover');
        });

        $(".menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $(".hamburger").toggleClass("active");
            $(".nav-devider").toggleClass("active");
            $('.logo_k').toggleClass('active');
            // $('.nav-hide').toggle();
            if ($('.nav-hide').is(":hidden")) {
                $('.nav-hide').slideDown("slow");
            } else {
                $('.nav-hide').slideUp();
            }

        });

        $(".carousel-position").mouseleave(function () {
            progressBarRun();
        });

        $(".carousel-position").mouseenter(function () {
            counter = 0;
            clearInterval(progressBar);
        });

        var counter = 0;
        var progressBar;

        function progressBarRun() {
            progressBar = setInterval(function () {
                counter += 1;
                if (counter > 100) clearInterval(progressBar);
                $(".progressbar").css("width", counter + "%");
            }, 45);
        }


        progressBarRun();
        $('#myCarousel').on('slid.bs.carousel', function () {
            counter = 0;
            clearInterval(progressBar);
            progressBarRun();
        });


        if ($('.subscribe-error').length > 0) {
            $("html, body").animate({scrollTop: $(document).height()}, 1000);
        }

        // if ($('.faq_box').is(":visible")) {
        //     console.log('visibelle');
        // }
        // if ($('.faq_box').is(":visible")) {
        //     console.log('visibelle');
        // }
        // getFaq(baseUrl);

    })


    function getFaq(baseUrl) {
        var jqxhr = $.getJSON(baseUrl + "api/get/faq", function (data) {
                console.log(data);

                $.each(data.data, function (key, val) {
                    $('<div class="col-md-12 faq-container"><h3>' + val.question + '</h3><p class="col-md-12">' + val.answer + '</p></div>')
                        .appendTo("#faq-container");

                    console.log(val.question);
                    console.log(val.answer);
                });

                $('error_message').hide();
            })
            .fail(function () {
                $('error_message').show();
            });

    }

    function pagination(page, curentpage) {

    }


})(jQuery)