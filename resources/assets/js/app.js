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
    })
})(jQuery)