$(function () {
    $(".directory > div > a").on("click", ajax);
    });
    function ajax() {
        // Формируем ссылку для AJAX-обращения
        var url = "function.php?path=" + $(this).data('path');
        // Отправляем AJAX-запрос и выводим результат
        $.ajax({
            url: encodeURI(url)
        }).done(function (data) {
            $('#list').html(data);
        });
    }
    
    


    