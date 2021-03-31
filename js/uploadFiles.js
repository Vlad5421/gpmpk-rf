(function ($) {

    var files; // переменная. будет содержать данные файлов

    // заполняем переменную данными файлов, при изменении значения file поля
    $('input[type=file]').on('change', function () {
        files = this.files;
    });


    // обработка и отправка AJAX запроса при клике на кнопку upload_files
    $('.upload_btn').on('click', function (event) {

        event.stopPropagation(); // остановка всех текущих JS событий
        event.preventDefault(); // остановка дефолтного события для текущего элемента - клик для <a> тега

        // Убираем блок с кнопками + отображаем процесс загрузки
        $('.file_upload_div').css('display', 'none');
        $('.process_upload').css('display', 'inline-block');

        // ничего не делаем если files пустой
        if (typeof files == 'undefined') return;

        // создадим данные файлов в подходящем для отправки формате
        var data = new FormData();
        $.each(files, function (key, value) {
            data.append(key, value);
        });

        // добавим переменную идентификатор запроса
        data.append('my_file_upload', 1);
        var subPhp = document.location.origin + "/pages/do/submit.php";
        // AJAX запрос
        $.ajax({
            url: subPhp,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,
            // функция успешного ответа сервера
            success: function (respond, status, jqXHR) {

                // ОК
                if (typeof respond.error === 'undefined') {
                    // файлы загружены, делаем что-нибудь

                    // покажем пути к загруженным файлам в блок '.ajax-reply'

                    var files_path = respond.files;
                    var html = $('.ajax-reply').html();
                    $.each(files_path, function (key, val) {
                        html += '<img src="' + val + '" class="new_img" alt>';
                        // html += val + '<br>';
                    })

                    $('.ajax-reply').html(html);
                }
                // error
                else {
                    console.log('ОШИБКА: ' + respond.error);
                }

                // Возвращаем блок с кнопками + убираем процесс загрузки
                $('.file_upload_div').css('display', 'block');
                $('.process_upload').css('display', 'none');
                $('.add_files_button').css('display', 'inline-block');
            },
            // функция ошибки ответа сервера
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }

        });

    });



})(jQuery)
