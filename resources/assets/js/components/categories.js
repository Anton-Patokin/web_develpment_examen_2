(function ($) {
    $('.dropdown-item').click(function () {
        event.preventDefault();
        console.log($(this).html());
        console.log(document.URL );


        var queryPairs = window.location.href.split('?').pop().split('&');
        for (var i = 0; i < queryPairs.length; i++)
        {
            var pair = queryPairs[i].split('=');
            if (pair[0] == 'sort')
            {
                console.log(queryPairs[i]);
                text =document.URL;
                var newSrc = $(this).attr('data-sort');

                window.location.replace(updateQueryStringParameter(document.URL,'sort',newSrc));

            }else{
                console.log('niuwe url');
                window.location.replace(document.URL+"/?sort=" + $(this).attr('data-sort'))
            }
        }
    })

    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
            return uri + separator + key + "=" + value;
        }
    }
})(jQuery)