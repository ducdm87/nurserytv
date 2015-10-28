$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $('#menu ul').hide();
});


function initMenu() {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
    //$('#menu ul:first').show();
    $('#menu li a').click(
            function () {
                var checkElement = $(this).next();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    return false;
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    $('#menu ul:visible').slideUp('normal');
                    checkElement.slideDown('normal');
                    return false;
                }
            }
    );
}
$(document).ready(function () {
    initMenu();
});


$(document).on('change', '.btn-file :file', function () {
    var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
$(document).ready(function () {
    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) {
                //console.log(log);
            }
        }
    });
});


/*
 * 
 *Ajax Process 
 **/

$(function () {

    $('#progress').css('display', 'none');
    var bar = $('.progress-bar');
    $('#ajaxUploadExtention').ajaxForm({
        beforeSend: function () {
            $('#progress').css('display', 'block');
            var percentVal = '0%';
            bar.css('width', percentVal);
            bar.html(percentVal);
        }, uploadProgress: function (event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.css('width', percentVal);
            bar.html(percentVal);
        },
        complete: function (xhr) {
            //window.location.reload(true);
            setTimeout(function () {
                window.location.reload(true);
            }, 2000);
        }
    });

});



$(document).ready(function ($) {
    $('.title-generate').blur(function (e) {
        title = $('.title-generate').val().trim();
        alias = convertAliasUtf8(title);
        $(".alias-generate").val(alias);
    });
});

function convertAliasUtf8(string)
{
    var array = {"đ": "d", "ă": "a", "â": "a", "á": "a", "à": "a", "ả": "a", "ã": "a", "ạ": "a", "ấ": "a", "ầ": "a", "ẩ": "a", "ẫ": "a", "ậ": "a", "ắ": "a", "ằ": "a", "ẳ": "a", "ẵ": "a", "ặ": "a", "é": "e", "è": "e", "ẻ": "e", "ẽ": "e", "ẹ": "e", "ế": "e", "ề": "e", "ể": "e", "ễ": "e", "ệ": "e", "í": "i", "ì": "i", "ỉ": "i", "ĩ": "i", "ị": "i", "ư": "u", "ô": "o", "ơ": "o", "ê": "e", "Ư": "u", "Ô": "o", "Ơ": "o", "Ê": "e", "ú": "u", "ù": "u", "ủ": "u", "ũ": "u", "ụ": "u", "ứ": "u", "ừ": "u", "ử": "u", "ữ": "u", "ự": "u", "ó": "o", "ò": "o", "ỏ": "o", "õ": "o", "ọ": "o", "ớ": "o", "ờ": "o", "ở": "o", "ỡ": "o", "ợ": "o", "ố": "o", "ồ": "o", "ổ": "o", "ỗ": "o", "ộ": "o", "ú":"u", "ù":"u", "ủ":"u", "ũ":"u", "ụ":"u", "ứ":"u", "ừ":"u", "ử":"u", "ữ":"u", "ự":"u", 'ý': 'y', 'ỳ': 'y', 'ỷ': 'y', 'ỹ': 'y', 'ỵ': 'y', 'Ý': 'Y', 'Ỳ': 'Y', 'Ỷ': 'Y', 'Ỹ': 'Y', 'Ỵ': 'Y', "Đ": "D", "Ă": "A", "Â": "A", "Á": "A", "À": "A", "Ả": "A", "Ã": "A", "Ạ": "A", "Ấ": "A", "Ầ": "A", "Ẩ": "A", "Ẫ": "A", "Ậ": "A", "Ắ": "A", "Ằ": "A", "Ẳ": "A", "Ẵ": "A", "Ặ": "A", "É": "E", "È": "E", "Ẻ": "E", "Ẽ": "E", "Ẹ": "E", "Ế": "E", "Ề": "E", "Ể": "E", "Ễ": "E", "Ệ": "E", "Í": "I", "Ì": "I", "Ỉ": "I", "Ĩ": "I", "Ị": "I", "Ư":"U", "Ô":"O", "Ơ":"O", "Ê":"E", "Ư":"U", "Ô":"O", "Ơ":"O", "Ê":"E", "Ú": "U", "Ù": "U", "Ủ": "U", "Ũ": "U", "Ụ": "U", "Ứ": "U", "Ừ": "U", "Ử": "U", "Ữ": "U", "Ự": "U", "Ó": "O", "Ò": "O", "Ỏ": "O", "Õ": "O", "Ọ": "O", "Ớ": "O", "Ờ": "O", "Ở": "O", "Ỡ": "O", "Ợ": "O", "Ố": "O", "Ồ": "O", "Ổ": "O", "Ỗ": "O", "Ộ": "O", "Ú":"U", "Ù":"U", "Ủ":"U", "Ũ":"U", "Ụ":"U", "Ứ":"U", "Ừ":"U", "Ử":"U", "Ữ":"U", "Ự":"U"};
    for (var val in array)
        string = string.replace(new RegExp(val, "g"), array[val]);
    string = string.toLowerCase();
    re = /[^a-zA-Z0-9-.]/gim;
    string = string.replace(re, '-');
    re = /^[-]+/gim;
    string = string.replace(re, '');
    re = /[-]+$/gim;
    string = string.replace(re, '');
    re = /[-]{2,}/gim;
    string = string.replace(re, '-');
    return string;
}


$(function () {
    var scntDiv = $('.body-media');
    var i = $('.body-media more-input').size() + 1;

    $('.add-input').click(function () {
        $('<div class="form-group more-input ">' +
                '<div class="col-md-7">' +
                '<label class="control-label">Link ' + i + '</label>' +
                '<div>' +
                '<input type="url" class="input-sm form-control" name="episode_url[' + i + ']" value=""/>' +
                '</div>' +
                '</div> <div class="col-md-4">' +
                '<label class="control-label">Name ' + i + '</label>' +
                '<div>' +
                '<input type="url" class="input-sm form-control" name="episode_name[' + i + ']" value=""/>' +
                '</div>' +
                '</div>' +
                '</div><div class="col-md-1"><a href="javscript:void(0)" class="remove" style="top:30px;position: relative;">Remove</a></div>').appendTo(scntDiv);
        i++;

        return false;
    });

    $('a.remove').on('click', function () {
        alert('cc');
        if (i > 2) {
            $(this).parents('div').remove();
            i--;
        }
        return false;
    });
});
function BrowseServer()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField;
    finder.popup();
}
function SetFileField(fileUrl)
{
    console.log(fileUrl);
    document.getElementById('image_hiden').value = fileUrl;
    document.getElementById('image_src').src = BASE_URL + fileUrl;
//    document.getElementById('video-src').src = BASE_URL + fileUrl;
}

function BrowseServerVideo() {

    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldVideo;
    finder.popup();
}

function SetFileFieldVideo(fileUrl)
{
    $('#checkYoutube').attr('checked', false);
    $('div.panel-image').show();
    console.log(fileUrl);
    document.getElementById('video_hiden').value = fileUrl;
//    document.getElementById('video_src').src = BASE_URL + fileUrl;
    document.getElementById('video-src').value = BASE_URL + fileUrl;
}


$(function () {
    $('select[name="type"]').change(function (e) {
        e.preventDefault();
        var value = $(this).val();
        if (value == 0) {
            $('.catalog').hide();
            $('.control-area').hide();
            $('.control-year').hide();
            $('.control-actor').hide();
            $('.control-duration').hide();
            $('.control-director').hide();
            $('.episode-control').hide();
            $('.video-control').hide();
        } else {
            $('.catalog').show();
            $('.control-area').show();
            $('.control-year').show();
            $('.control-actor').show();
            $('.control-duration').show();
            $('.control-director').show();
            $('.episode-control').show;
            $('.video-control').show();
        }

    });
    var check = $('#checkYoutube').is(':checked');
    if (check) {
        $('div.panel-image').hide();
    }
    $('#checkYoutube').click(function () {
        if ($(this).is(':checked')) {
            $('div.panel-image').hide();
        } else {
            $('div.panel-image').show();
        }
    });


});


function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

$(function () {
    $.post('categories/edit', {id: GetURLParameter('id')}, function (data) {

    });
});

$(function () {
//    $('.pannel-upload').hide();
    $('.btn-upload').click(function () {
        $('.pannel-upload').show();
        $('.form-youtube').hide();
        $('.control-iframe').hide();
    });

//    $('.btn-youtube').click(function () {
//        $('.pannel-upload').hide();
//        $('.form-youtube').show();
//        $('.control-iframe').show();
//    });

    $('.btn-collapse').hover(function () {
        $('.btn-collapse i').addClass('fa fa-caret-up');

    }, function () {
        $('.btn-collapse i').addClass('fa fa-caret-down');
    });

    $('input[type="radio"]').click(function () {
        var link = $('.fakelink').val();
        if ($(this).val() == 0) {
            var iframe = '<iframe width="560" height="315" src="' + link + '?rel=0&autoplay=0" frameborder="0" allowfullscreen></iframe>';

        } else {
            var iframe = '<iframe width="560" height="315" src="' + link + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
        }
        var text = $('.iframe-container textarea').text(iframe);
    });

    //Ajax get info

    $('.form-youtube').submit(function (e) {
        var $form = $(this);
        var fakelink = $('.fakelink').val();
        $.ajax({
            type: 'POST',
            url: BASE_URL + '/backend/videos/queryyoutube',
            cache: false,
            data: $form.serialize(),
            beforeSend: function (xhr) {

            }, success: function (data, textStatus, jqXHR) {
                if (data !== 'false') {
                    var obj = jQuery.parseJSON(data);
                    $('.txt-fecth_link').val(fakelink);
                    $('.title-generate').val(obj.title);
                    $('.alias-generate').val(convertAliasUtf8(obj.title));
                    $('.txt-iframe').text(obj.html);
                    $('#image_hiden').val(obj.thumbnail_url);
                    $('#image_src').attr('src', obj.thumbnail_url);
                }

            }
        });

        e.preventDefault();

    });
});