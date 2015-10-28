
$(function () {
    $('#formServer').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: '/backend/mediacrawler/getserver',
            type: 'post',
            cache: false,
            data: form.serialize(),
            beforeSend: function (xhr) {

            }, success: function (data, textStatus, jqXHR) {
                console.log(data);
            }
        });
    });
});

