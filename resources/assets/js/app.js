require('./bootstrap');
(function ($) {
    $(document).ready(function () {
        $(".menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $(".hamburger").toggleClass("active");
            $(".nav-devider").toggleClass("active");
            $('.logo_k').toggleClass('active');


        });

        $(".carousel-position").mouseout(function () {
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
                $(".progressbar").css("width", counter + "vw");
            }, 45);
        }


        progressBarRun();
        $('#myCarousel').on('slid.bs.carousel', function () {
            counter = 0;
            clearInterval(progressBar);
            progressBarRun();
        });
    })
})(jQuery)