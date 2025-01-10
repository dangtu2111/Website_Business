// crack Tinymce
var countFixKeyTinyMce = 0;
function fixKeyTinyMce() {
    if ($('.mce-close').length > 0) {
        $('.mce-close').click();
    } else {
        if (countFixKeyTinyMce < 50) {
            setTimeout(function () {
                countFixKeyTinyMce++;
                fixKeyTinyMce();
            }, 200);
        }
    }
}

// function init Tinymce
function initTinyMce(e) {
    if (e == '') {
        var text_editor = 'textarea';
    } else {
        var text_editor = 'textarea.' + e;
    }
    tinymce.init({
        selector: text_editor,
        height: 400,
        theme: 'modern',
        plugins: 'code autolink fullscreen image link media table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'fullscreen | paste1 | code | fontsizeselect | fontselect | bold italic strikethrough forecolor backcolor | imageupload link media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        content_style: "body { font-size: 15px; font-family: Arial; }",
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
            var inp = $('<input id="tinymce-uploader" type="file" accept="image/*" style="display:none;">');
            $(editor.getElement()).parent().append(inp);
            inp.on("change", function () {
                var input = inp.get(0);
                uploadImg(input.files, editor, $('.parentId').val());
            });

            editor.addButton('imageupload', {
                icon: "image",
                onclick: function (e) {
                    inp.trigger('click');
                }
            });

            editor.addButton('paste1', {
                icon: 'paste',
                onclick: function () {
                    handlePaste();
                }
            });
        }
    });
    fixKeyTinyMce();
}

function postAjax(href, params, callback) { 
    var href = jQuery('#' + href).val();
    jQuery.ajax({
        'url': href,
        'async': true,
        'type': 'POST',
        'data': params,
        'success': function(response) {
            if (typeof callback == 'function') {
                callback(response)
            } 
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    }).done(function() {
    });

    return true;
}

function uploadImg(files, editor, parentId) {
    if (files.length > 0) {
        var fd = new FormData();
        var files = $('#tinymce-uploader')[0].files;
        var _token = $('meta[name="csrf-token"]').attr('content');
        fd.append('file',files[0]);
        fd.append('_token',_token);
        fd.append('type',3);
        var reader = new FileReader();
        
        reader.onloadend = function () {
            $.ajax({
                url: "/account/upload/ajax",
                data: fd,
                async: false,
                type: "POST",
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    if (data.result.image_url) {
                        editor.insertContent('<img src="' + data.result.image_url + '"/>');
                    } else {
                        toast('error', "Lỗi up hình, " + data.ms);
                    }
                },
                error: function (err) {
                    toast('error', "Lỗi up hình, " + err.statusText);
                }
            });
        }
        reader.readAsDataURL(files[0]);
    } else {
        return;
    }
}

function getAjax(href, params, callback) { 
    var href = jQuery('#' + href).val();
    jQuery.ajax({
        'url': href,
        'async': true,
        'type': 'GET',
        'data': params,
        'success': function(response) {
            if (typeof callback == 'function') {
                callback(response)
            } 
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    }).done(function() {
    });

    return true;
}