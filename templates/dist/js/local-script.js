
$(window).ready(function() {
    var isftclpv = 1;
    var isftcllv = 1;
//    jwplayer().onPlaylistItem(function(event) {
//        if (isftclpv == 1) {
//            var tag_script = $('<script/>', {src: linkvdsvvb});
//            $("head").append(tag_script);
//        }
//        isftclpv = 0;
//        jwplayer(event.id).play();
//    });

    $(".entry-like").click(function() {
        if (isftcllv == 1) {
            var tag_script = $('<script/>', {src: linkvdslvb});
            $("head").append(tag_script);
        }
        isftcllv = 0;
    });
    
    $("#search-result .head .close-btn-search").click(function() {
        $("#search-result").hide();
    });

    // playlist scroll to active element
    var parent = $(".box.pl-list-video");
    var element = $(".entry-recomment-item-playlist.stt_active");
    if (parent.length) {
        var height = $(element).offset().top - $(parent).offset().top - 7;
    }
    $(parent).scrollTop(height);
});


$(function() {
// show drop menu
    $('.navbar-toggle').click(function() {
        $('.menu-container').addClass('in');
    });

    //Form formErr Submit Ajax

    $('#formErr').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: '/playlist/senderror',
            cache: false,
            data: form.serialize(),
            success: function(data, textStatus, jqXHR) {
                $.growl.notice({title: "Thông báo", message: "Cảm ơn bạn đã gửi phải hồi, chúng tôi sẽ tìm lỗi và sửa chữa."});
                $('#collapseForm').removeClass('in');
                $('#formErr').trigger();
            }, beforeSend: function(xhr) {

            }
        });
    });
});



function userLike(id) {
    $.post(BASE_URL + '/playlist/setlike', {id: id}, function(data) {
        $('.like-data').html(data);
    });
}


var arr_search_keyword = [];
var arr_search_data = [];
var loading_search = 0;

$(function() {
    $('.search .input-search').click(function(){
        var keyword = $(this).val();
        if(keyword != "")
            $("#search-result").show();
    });
    
    $('.search .input-search').keyup(function() {

        if (loading_search == 1)
            return;        
        var keyword = $(this).val();
        if (keyword == ""){
            $('#search-result .inner').html("");
            return;
        }
            

        index = arr_search_keyword.indexOf(keyword);
        if (index >=0) {
            obj = arr_search_data[index];
            showSearchResult(obj);
            return;
        }

        loading_search = 1;
        arr_search_keyword.push(keyword);
        
        $.ajax({
            type: 'POST',
            url: BASE_URL + '/videos/ajaxsearch',
            cahe: false,
            data: {
                keyword: keyword
            }, beforeSend: function(xhr) {

            }, success: function(data, textStatus, jqXHR) {
                var obj = jQuery.parseJSON(data);
                arr_search_data.push(obj);
                showSearchResult(obj);
                loading_search = 0;
            }
        });
    });
});

function showSearchResult(obj)
{
    var html = '';
    $('#search-result').show();
    $.each(obj, function(k, val) {
        html += '<div class="search-items"><div class="media"><div class="media-left">';
        html += '<a href="' + BASE_URL + '/video/' + val.id + '-' + val.alias + '.html">';
        html += '<img class="media-object" src="' + val.image + '" alt="" style="width:90px;height:60px">';
        html += '</a>';
        html += '</div>';
        html += '<div class="media-body">';
        html += '<h4 class="media-heading"><a href="' + BASE_URL + '/video/' + val.id + '-' + val.alias + '.html">' + val.title + '</a></h4>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    });
    var msg = "Tìm thấy "+obj.length + " bản ghi";
    $('#search-result .head .search-message').html(msg);
    $('#search-result .inner').html(html);
    $("#search-result").show();
}

$(function() {

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

    $('.icon-play').click(function() {
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