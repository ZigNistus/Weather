$(document).ready(function () {
    $('#news').load('inc/php/news/news_load.php')
    $('#right__input').on('keyup', function () {
        var val = $(this).val()
        if (val === '') {
            $("#news").load('inc/php/news/news_load.php')
        }
        else {
            $("#news").load('inc/php/news/news_search.php', { val: val })
        }
    })
})