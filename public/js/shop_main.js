$(document).ready(function(){

    // переключение между категориями
    $('.categories-list').on('click', '.category-link', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            type: 'GET',
            url: url,
            success: function (result) {
                var categories = $(result).find('.categories-list').html();
                $('.categories-list').html(categories);
                var products = $(result).find('.products-list').html();
                $('.products-list').html(products);
                var paginator = $(result).find('.paginator-block').html();
                $('.paginator-block').html(paginator);
            }
        });
    });

    // пагинация товаров
    $(document).on('click', 'a.page-link', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'GET',
            url: url,
            success: function (result) {
                var products = $(result).find('.products-list').html();
                $('.products-list').html(products);
                var paginator = $(result).find('.paginator-block').html();
                $('.paginator-block').html(paginator);
            }
        })
    });

});