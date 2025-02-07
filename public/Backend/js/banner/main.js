(function ($) {
    $.fn.listIMG = function (type, options) {
        type = type || "file";

        // Thiết lập sự kiện click cho phần tử
        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $(this).siblings('.input-item');
            var target_preview = $(this).siblings('.preview-img');
            var listIMG = $("#list-img");

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
                    target_preview.append(
                        $("<img>").css("height", "100%").attr("src", item.url)
                    );
                });

                // Kích hoạt sự kiện change trên phần tử preview
                target_preview.trigger("change");

                // Thêm phần tử mới vào list-img sau khi chọn ảnh
                listIMG.append(`
                    <div style="    display: flex">
                    <div class="box-img-upload box-avatar" style="width: 100%;">
                        <div style="height: 100%;" class="preview-img">
                            <img src="" style="height: 100%;">
                        </div>
                        <input class="input-item form-control" value="" type="hidden" name="cover_image[]">
                        <a data-input="thumbnail" data-preview="holder" class="img-item upload-file el-link el-link--default">
                            <span class="el-link--inner">
                                <span class="material-icons">upload_file</span>
                            </span>
                        </a>
                    </div>
                     <button type="button" style="    background: transparent;border: none;color: red;font-size: 20px;" data-category-id="#" data-category-name="#" class="remove-img el-button el-button--danger is-circle"><!----><i class="el-icon-delete"></i><!----></button>
                                                </div>
                `);

                // Gắn lại sự kiện cho các phần tử mới được thêm vào
                $(".img-item").listIMG("image");
            };
            return false;
        });
    };
})(jQuery);

// Gọi sự kiện cho các img-item hiện tại và các img-item mới thêm vào
$(".img-item").listIMG("image");
$(document).on('click', '.remove-img', function () {
    // Tìm thẻ cha trực tiếp của nút và xóa
    $(this).closest('div[style*="display: flex"]').remove();
});
