$(document).ready(function(){

    // обработка событий удаления товаров
    $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var url = $(this).find('.form-delete').attr('action');
        var data = $(this).find('.form-delete').serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function (result) {
                alert("Выбранный элемент удалён!");
                var elements = $(result).find('#main-table').html();
                $('#main-table').html(elements);
                var paginator = $(result).find('#paginator-block').html();
                $('#paginator-block').html(paginator);
            }
        });
    });

    // обработка событий удаления категорий
    $(document).on('click', '#category-delete', function(event) {
        event.preventDefault();
        var url = $(this).find('.form-delete').attr('action');
        var data = $(this).find('.form-delete').serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function (result) {
                alert("Выбранная категория удалена!");
                var elements = $(result).find('#main-table').html();
                $('#main-table').html(elements);
                var paginator = $(result).find('#paginator-block').html();
                $('#paginator-block').html(paginator);
            },
            error: function () {
                alert("Категория не может быть удалена, т.к. в ней содержатся товары!");
            }
        });
    });

    // обработка событий удаления материалов
    $(document).on('click', '#material-delete', function(event) {
        event.preventDefault();
        var url = $(this).find('.form-delete').attr('action');
        var data = $(this).find('.form-delete').serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function (result) {
                alert("Выбранный материал удалён!");
                var elements = $(result).find('#main-table').html();
                $('#main-table').html(elements);
                var paginator = $(result).find('#paginator-block').html();
                $('#paginator-block').html(paginator);
            },
            error: function () {
                alert("Материал не может быть удалён, т.к. имеются соответствующие товары!");
            }
        });
    });

});