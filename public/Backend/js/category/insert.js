$(document).ready(function () {
    // Define function to open filemanager window
    var lfm = function (options, cb) {
        var route_prefix =
            options && options.prefix ? options.prefix : "/laravel-filemanager";
        window.open(
            route_prefix + "?type=" + options.type || "file",
            "FileManager",
            "width=900,height=600"
        );
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function (context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ', // Icon for the button
            tooltip: "Insert image with filemanager",
            click: function () {
                lfm(
                    { type: "image", prefix: "/laravel-filemanager" },
                    function (lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke("insertImage", lfmItem.url); // Insert image to summernote
                        });
                    }
                );
            },
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    $("#summernote").summernote({
        height: 400, // Chỉ định chiều cao cho Summernote (theo pixel)
        toolbar: [
            // Add LFM button to the popovers group
            ["style", ["bold", "italic", "underline", "clear"]], // Full toolbar options can be added here
            ["font", ["strikethrough", "superscript", "subscript"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["insert", ["link", "lfm", "video"]],
            ["view", ["fullscreen", "codeview", "help"]],
        ],
        buttons: {
            lfm: LFMButton, // Define the custom LFM button
        },
    });
});

$(document).ready(function () {
    $('form').submit(function(event) {
        var isValid = true;

        // Lặp qua từng input có thuộc tính required
        $('input[required]').each(function() {
            var inputField = $(this);
            
            // Nếu trường trống, hiển thị thông báo lỗi dưới input
            if (inputField.val() === '') {
                isValid = false;
                
                // Kiểm tra nếu thông báo lỗi đã tồn tại, nếu chưa thì tạo mới
                if (inputField.next('.error-message').length === 0) {
                    inputField.after('<div class="error-message" style="color: red; font-size: 12px;">Trường này là bắt buộc!</div>');
                }

                return false;  // Dừng vòng lặp nếu có lỗi
            } else {
                // Nếu trường không trống, loại bỏ thông báo lỗi nếu có
                inputField.next('.error-message').remove();
            }
        });

        // Nếu không hợp lệ, ngừng gửi form
        if (!isValid) {
            event.preventDefault();  // Ngừng hành động submit
        }
    });
    var statusValue = $(".category_id").val();
    $('.el-select-dropdown__item span').each(function() {
        var spanData = $(this).attr("data"); // Lấy giá trị data của thẻ span
        if(statusValue==spanData){
            var selectedValue=$(this).text()
            .replace(/\s+/g, " ")
            .trim();
            var parent = $(this).closest(".el-select"); // Tìm phần tử cha .el-select
            parent.find(".el-input__inner").val(selectedValue);
        }
        
    });
    // Khi nhấn vào một mục trong danh sách
    $(".el-select-dropdown__item").on("click", function () {
        var selectedValue = $(this).find("span").text(); // Lấy giá trị
        var parent = $(this).closest(".el-select"); // Tìm phần tử cha .el-select
        parent.find(".el-input__inner").val(selectedValue); // Gán giá trị vào input
        
        var category_id = $(this).find("span").attr("data");
        parent.find(".category_id").val(category_id); // Gán giá trị vào input
        // Ẩn dropdown sau khi chọn
        parent.find(".el-select-dropdown").hide();
    });
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".el-select").length) {
            $(".el-select-dropdown").hide(); // Ẩn tất cả các dropdown
        }
    });

    // Khi nhấn vào input để mở dropdown
    $(".el-input__inner").on("click", function () {
        var parent = $(this).closest(".el-select"); // Tìm phần tử cha .el-select
        var dropdown = parent.find(".el-select-dropdown"); // Dropdown tương ứng

        // Ẩn tất cả các dropdown khác trước khi hiển thị dropdown hiện tại
        $(".el-select-dropdown").not(dropdown).hide();

        // Hiển thị hoặc ẩn dropdown tương ứng
        dropdown.toggle();
    });
    // $(".el-switch").click(function () {
    //     // Kiểm tra xem div đã có class 'is-checked' chưa
    //     if ($(this).hasClass("is-checked")) {
    //         // Nếu có, chuyển sang trạng thái chưa được chọn
    //         $(this).removeClass("is-checked");
    //         $(this)
    //             .find(".el-switch__label--left")
    //             .addClass("is-active")
    //             .find("span")
    //             .text("Off");
    //         $(this)
    //             .find(".el-switch__label--right")
    //             .removeClass("is-active")
    //             .find("span")
    //             .text("On");
    //         $(this).find(".el-switch__core").css({
    //             width: "40px",
    //             "border-color": "rgb(255, 73, 73)",
    //             "background-color": "rgb(255, 73, 73)",
    //         });
    //         $(this).find("input").val("false");
    //         $(this).find("input").prop("checked", false); // Chuyển trạng thái checkbox thành 'Off'
    //     } else {
    //         // Nếu không có, chuyển sang trạng thái đã được chọn
    //         $(this).addClass("is-checked");
    //         $(this)
    //             .find(".el-switch__label--left")
    //             .removeClass("is-active")
    //             .find("span")
    //             .text("Off");
    //         $(this)
    //             .find(".el-switch__label--right")
    //             .addClass("is-active")
    //             .find("span")
    //             .text("On");
    //         $(this).find(".el-switch__core").css({
    //             width: "40px",
    //             "border-color": "rgb(19, 206, 102)",
    //             "background-color": "rgb(19, 206, 102)",
    //         });
    //         $(this).find("input").val("true");

    //         $(this).find("input").prop("checked", true); // Chuyển trạng thái checkbox thành 'On'
    //     }
    // });
    $(".status").each(function () {
        var statusValue = $(this).val() === "true";
        var parent = $(this).closest(".el-switch");

        // Cập nhật trạng thái ban đầu
        updateSwitch(parent, statusValue);

        // Sự kiện click
    });
    $(".el-switch").click(function () {
        var isChecked = $(this).hasClass("is-checked");
        var newValue = !isChecked;

        // Toggle trạng thái
        $(this).toggleClass("is-checked");
        $(this).attr("aria-checked", newValue.toString());
        $(this)
            .find("input")
            .val(newValue ? "true" : "false");

        // Cập nhật giao diện
        updateSwitch($(this), newValue);
    });

    // Hàm cập nhật giao diện
    function updateSwitch(element, isChecked) {
        if (isChecked) {
            element.addClass("is-checked");
            element.attr("aria-checked", "true");

            element.find(".el-switch__label--left").removeClass("is-active");
            element.find(".el-switch__label--right").addClass("is-active");

            element
                .find(".el-switch__label--left span")
                .attr("aria-hidden", "true");
            element
                .find(".el-switch__label--right span")
                .removeAttr("aria-hidden");
            element.find(".el-switch__core").css({
                width: "40px",
                "border-color": "rgb(19, 206, 102)",
                "background-color": "rgb(19, 206, 102)",
            });
        } else {
            element.removeClass("is-checked");
            element.attr("aria-checked", "false");

            element.find(".el-switch__label--left").addClass("is-active");
            element.find(".el-switch__label--right").removeClass("is-active");

            element
                .find(".el-switch__label--left span")
                .removeAttr("aria-hidden");
            element
                .find(".el-switch__label--right span")
                .attr("aria-hidden", "true");
            element.find(".el-switch__core").css({
                width: "40px",
                "border-color": "rgb(255, 73, 73)",
                "background-color": "rgb(255, 73, 73)",
            });
        }
    }
});
(function ($) {
    $.fn.filemanager = function (type, options) {
        type = type || "file";

        this.on("click", function (e) {
            var route_prefix =
                options && options.prefix ? options.prefix : "/filemanager";
            var target_input = $("#" + $(this).data("input"));
            var target_preview = $("#" + $(this).data("preview"));
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

$("#lfm").filemanager("image");
