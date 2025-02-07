$(document).ready(function () {
    // Thêm mới gallery-item
    $("#addSocialButton").on("click", function () {
        var gallery = `
            <div class="galleries-item">
                <div class="galleries-item-image" style="width: 120px; height: 120px;">
                    <a class="uploadSocial el-link el-link--default" data-input="img_social" data-preview="img_social_preview">
                        <span class="el-link--inner img_social_preview" >
                            <i class="material-icons">cloud_upload</i>

                        </span>
                        <input type="hidden" autocomplete="off" name="img_social[]" class="img_social el-input__inner">

                    </a>
                </div>
                <div class="galleries-item-des">
                    <div class="galleries-item-des-group" style="grid-template-columns: repeat(1, minmax(0px, 1fr));">
                        <div class="galleries-item-des-item">
                            <div class="galleries-item-des-item-right">Tên</div>
                            <div class="galleries-item-des-item-left">
                                <div class="el-input">
                                    <input type="text" autocomplete="off" name="nameSocial[]" class="el-input__inner">
                                </div>
                            </div>
                        </div>
                        <div class="galleries-item-des-item">
                                                                <div class="galleries-item-des-item-right">Tên tài khoản</div>
                                                                <div class="galleries-item-des-item-left">
                                                                    <div class="el-input">
                                                                       
                                                                        <input type="text" autocomplete="off" value="" name="account_name[]" class="el-input__inner">
                                                                    </div>
                                                                </div>
                                                            </div>
                        <div class="galleries-item-des-item">
                            <div class="galleries-item-des-item-right">Liên kết</div>
                            <div class="galleries-item-des-item-left">
                                <div class="el-input">
                                    <input type="text" autocomplete="off" name="linkSocial[]" class="el-input__inner">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="el-input">
                        <input type="hidden" autocomplete="off" class="el-input__inner">
                    </div>
                </div>
                <a class="galleries-item-remove btn btn-danger btn-burger el-link el-link--default">
                    <span class="el-link--inner">
                        <i class="material-icons">delete_outline</i>
                    </span>
                </a>
            </div>`;
        
        $('.galleries').append(gallery); // Thêm phần tử vào danh sách
        $(".uploadSocial").each(function () {
            $(this).uploadIconSocial("image");
        });
    });

    // Xóa gallery-item khi bấm nút "Xóa"
    $(document).on("click", ".galleries-item-remove", function () {
        $(this).closest(".galleries-item").remove(); // Tìm phần tử cha gần nhất và xóa
    });
});
(function ($) {
    $.fn.uploadLogo = function (type, options) {
        type = type || "file";

        // Thiết lập sự kiện click cho phần tử
        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $("#" + $(this).data("input"));
            var target_preview = $("." + $(this).data("preview"));

            // Mở cửa sổ file manager
            window.open(
                route_prefix + "?type=" + type,
                "FileManager",
                "width=900,height=600"
            );

            // Hàm xử lý khi người dùng chọn file
            window.SetUrl = function (items) {
                var file_path = items
                    .map(function (item) {
                        return item.url;
                    })
                    .join(",");

                // Cập nhật giá trị của input với URL ảnh
                target_input.val(file_path).trigger("change");

                // Xóa ảnh xem trước cũ
                target_preview.html("");

                // Thêm ảnh xem trước
                items.forEach(function (item) {
                    target_preview.each(function () {
                        $(this).append(
                            $("<img>").css("height", "100%").attr("src", item.url)
                        );
                    });
                });

                // Kích hoạt sự kiện change trên phần tử preview
                target_preview.trigger("change");
            };
            return false;
        });
    };
})(jQuery);

$("#lfm").uploadLogo("image");
(function ($) {
    $.fn.uploadIconSocial = function (type, options) {
        type = type || "file";
        console.log('asdfasd');
        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $(this).find("." + $(this).data("input"));
            var target_preview =$(this).find("." + $(this).data("preview"));
            window.open(
                route_prefix + "?type=" + type,
                "FileManager",
                "width=900,height=600"
            );
            window.SetUrl = function (items) {
                var file_path = items
                    .map(function (item) {
                        return item.url;
                    })
                    .join(",");

                // set the value of the desired input to image url
                target_input.val("").val(file_path).trigger("change");

                // clear previous preview
                target_preview.html("");

                // set or change the preview image src
                items.forEach(function (item) {
                    target_preview.append(
                        $("<img>").css("height", "100%").attr("src", file_path)
                    );
                });

                // trigger change event
                target_preview.trigger("change");
            };
            return false;
        });
    };
})(jQuery);
$(".uploadSocial").each(function () {
    $(this).uploadIconSocial("image");
});

