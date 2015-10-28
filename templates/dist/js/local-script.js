
$(function () {
// show drop menu
    $('.navbar-toggle').click(function () {
        $('.menu-container').addClass('in');
    });

    //Form formErr Submit Ajax

    $('#formErr').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: '/playlist/senderror',
            cache: false,
            data: form.serialize(),
            success: function (data, textStatus, jqXHR) {
                $.growl.notice({title: "Thông báo", message: "Cảm ơn bạn đã gửi phải hồi, chúng tôi sẽ tìm lỗi và sửa chữa."});
                $('#collapseForm').removeClass('in');
                $('#formErr').trigger();
            }, beforeSend: function (xhr) {

            }
        });
    });
});



function userLike(id) {
    $.post(BASE_URL + '/playlist/setlike', {id: id}, function (data) {
        $('.like-data').html(data);
    });
}

$(function () {
    $('.search .input-search').keyup(function () {
        var keyword = $(this).val();

        $.ajax({
            type: 'POST',
            url: BASE_URL + '/videos/ajaxsearch',
            cahe: false,
            data: {
                keyword: keyword
            }, beforeSend: function (xhr) {

            }, success: function (data, textStatus, jqXHR) {
                var obj = jQuery.parseJSON(data);
                var html = '';
                $('#search-result').show();
                $.each(obj, function (k, val) {
                    html += '<div class="search-items">';
                    html += '<div class="media">';
                    html += '<div class="media-left">';
                    html += '<a href="' + BASE_URL + '/playlist/detail?pid=' + val.play_id + '&pslug=&vid=' + val.id + '&vslug=' + val.alias + '">';
                    html += '<img class="media-object" src="' + val.image + '" alt="" style="width:90px;height:60px">';
                    html += '</a>';
                    html += '</div>';
                    html += '<div class="media-body">';
                    html += '<h4 class="media-heading"><a href="' + BASE_URL + '/playlist/detail?pid=' + val.play_id + '&pslug=&vid=' + val.id + '&vslug=' + val.alias + '">' + val.title + '</a></h4>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                $('#search-result').html(html);

            }
        });
    });
});

$(function () {

    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var player;
    function onYouTubePlayerAPIReady(key) {
        player = new YT.Player('ytplayer', {
            height: '390',
            width: '640',
            videoId: key,
            playerVars: {
                'autoplay': 1
            }

        });
    }

    $('.icon-play').click(function () {
        var key = $(this).attr('rel');
        var link_origin = $(this).attr('data-link');
        if (key !== '' && link_origin == '') {
            $(this).parents('div').children('.ytplayer').attr('id', 'ytplayer');
            onYouTubePlayerAPIReady(key);
        }
        if (link_origin) {
            $(this).parents('div').children('.ytplayer').attr('id', 'ytplayer');
            $(this).parents('div').children('img').hide();
            onJwplayerReady(link_origin);
        }
    });

});

function onJwplayerReady(url) {
    jwplayer("ytplayer").setup({
        width: "100%",
        height: "350px",
        aspectratio: "12:7",
        file: url,
    });
}