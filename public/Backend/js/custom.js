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
    var text_editor = (e === '') ? 'textarea' : 'textarea.' + e;

    tinymce.init({
        selector: text_editor,
        height: 400,
        theme: 'modern',
        plugins: 'code autolink fullscreen image link media table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'fullscreen | paste1 | code | fontsizeselect | fontselect | bold italic strikethrough forecolor backcolor | image link media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
        image_advtab: true,
        content_style: "body { font-size: 15px; font-family: Arial; }",
        
        // Cấu hình callback cho việc chọn file
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            console.log(meta.fieldname);
            var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.openUrl({
              url : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no",
              onMessage: (api, message) => {
                callback(message.content);
              }
            });
        },
        
        setup: function (editor) {
            // Lắng nghe sự kiện thay đổi của editor
            editor.on('change', function () {
                editor.save();
            });

            // Thêm nút upload hình ảnh (sử dụng FileManager)
            editor.addButton('imageupload', {
                icon: "image",
                onclick: function () {
                    // Mở trình quản lý hình ảnh thông qua FileManager
                    tinymce.activeEditor.windowManager.open({
                        file: '/filemanager?type=Images', // Đảm bảo đường dẫn này hợp lệ
                        title: 'Filemanager',
                        width: 800,
                        height: 600,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            });

            // Thêm nút dán nội dung
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