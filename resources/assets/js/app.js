require('./bootstrap');

(function ($) {
    $(document).ready(function () {


        
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

        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/public/';
        console.log(baseUrl);


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

    })
})(jQuery)