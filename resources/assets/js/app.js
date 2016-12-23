
require('./bootstrap');
(function ($) {
    $(document).ready(function () {
        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    })
})(jQuery)