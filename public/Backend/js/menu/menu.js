$(document).ready(function () {
    function postAjax(url, params, callback) {
        $.ajax({
            url: url,
            type: "POST",
            data: params,
            success: callback,
            error: function () {
                alert("An error occurred");
            },
        });
    }

    function showNotification(message, type) {
        // Assuming you use a custom notification system
        alert(type + ": " + message);
    }
    $(document).on("click", ".el-dialog__headerbtn", function () {
        if ($(this).attr("aria-label") == "Close") {
            $(this).closest(".el-dialog__wrapper").hide();
        }
    });
    $(document).on("click", ".menu-group", function () {
        $("#dialogGroup").show();
        $("#store-group").attr("data-type", "insert");
        $("#dialogGroup").find("input.name").val("");
        $("#dialogGroup").find("input.id").val("");
    });
    $(document).on("click", ".lien-ket", function () {
        $("#dialogLink").show();
        $("#store-group").attr("data-type", "edit");
        $("#dialogLink").find("input.name").val("");
        $("#dialogLink").find("input.id").val("");
        $("#dialogLink").find("input.link").val("");

        $("#store-link").attr("action", "menu/insert/post");
    });
    $("#store-link").on("submit", function (e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của form
        updateSort();
        var formData = $(this).serialize(); // Chuyển dữ liệu form thành chuỗi URL encoded
        postAjax("menu/insert/post", formData, function (response) {
            // Thêm phần tử <li> vào danh sách

            $("#dialogLink").hide();

            updateMenu();
        });
    });
    function dataName(element) {
        // Kiểm tra nếu phần tử không có thẻ <ol> con
        if (element.children("ol").length == 0) {
            return element.attr("data-id"); // Lấy data-id của phần tử
        }

        var keyname = element.attr("data-id"); // Lấy data-id của phần tử hiện tại
        var array01 = []; // Mảng để chứa data-id của phần tử hiện tại
        array01.push(keyname);

        var array02 = []; // Mảng để chứa các data-id của các thẻ <li> trong <ol>
        element
            .children("ol")
            .children("li")
            .each(function () {
                array02.push(dataName($(this))); // Gọi đệ quy và thêm vào mảng array02
            });

        array01.push(array02); // Thêm mảng array02 vào mảng array01
        return array01; // Trả về mảng các data-id
    }

    function updateSort() {
        var outputArray = [];
        $("#link-list")
            .children("li")
            .each(function () {
                // Lấy giá trị data-id hoặc mảng data-id từ hàm dataName
                outputArray.push(dataName($(this)));
            });

        var _token = $('meta[name="csrf-token"]').attr("content"); // Lấy CSRF token từ meta
        var dataToSend = {
            data: outputArray,
            _token: _token,
        };

        // Sử dụng $.param để chuyển thành định dạng serialize
        var serializedData = $.param(dataToSend);
        console.log(serializedData); // In kết quả ra console

        postAjax("menu/update", serializedData, function (response) {
            console.log("Dữ liệu đã được gửi thành công:", response);
            // Xử lý phản hồi thành công từ server
        });
    }
    // Khi click vào nút có id 'update-group-btn'
    $("#update-group-btn").on("click", function (e) {
        e.preventDefault(); // Ngăn hành vi mặc định của nút
        updateSort();
    });

    $(document).on("click", ".detail-link", function () {
        var type = $(this).attr("data-type");
        if (type == "group") {
            var keyname = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            $("#store-group").attr("data-type", "edit");
            $("#dialogGroup").show();
            $("#dialogGroup").find("input.name").val(name);
            $("#dialogGroup").find("input.id").val(keyname);
        } else {
            var keyname = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            var link = $(this).attr("data-link");
            $("#dialogLink").show();
            $("#dialogLink").find("input.name").val(name);
            $("#dialogLink").find("input.id").val(keyname);
            $("#dialogLink").find("input.link").val(link);
        }
    });
    $(document).on("click", ".remove-menu", function () {
        var id = $(this).attr("data-id");
        var urlDelete = "http://127.0.0.1:8000/admin/menu/delete/" + id;
        updateSort();
        $.ajax({
            url: urlDelete, // URL của API
            type: "GET", // Phương thức GET
            dataType: "json", // Dữ liệu trả về dưới dạng JSON
            success: function (response) {
                updateMenu();
            },
            error: function (xhr, status, error) {
                // Xử lý khi có lỗi
                console.error("Error:", error);
            },
        });
    });

    function stringHtml(menu_item, key) {
        var html = "";

        // Nếu không có phần tử con
        if (!menu_item.child) {
            var link = menu_item.link ? menu_item.link : "";
            html +=
                '<li data-id="' +
                key +
                '" class="dd-item dd3-item">' +
                '<div class="dd-handle dd3-handle"></div>' +
                '<div class="content">' +
                menu_item.name +
                " | " +
                link +
                '<div class="tool">' +
                '<i class="detail-link" data-id="' +
                key +
                '" data-name="' +
                menu_item.name +
                '" data-type="link" data-link="' +
                menu_item.link +
                '">Sửa</i>' +
                '<i class="remove-menu" data-id="' +
                key +
                '">Xoá</i>' +
                "</div>" +
                "</div>" +
                "</li>";
        } else {
            // Nếu có phần tử con
            var link = menu_item.link ? menu_item.link : "";

            html +=
                '<li data-id="' +
                key +
                '" class="dd-item dd3-item">' +
                '<div class="dd-handle dd3-handle"></div>' +
                '<div class="content">' +
                menu_item.name +
                " | " +
                link +
                '<div class="tool">' +
                '<i class="detail-link" data-id="' +
                key +
                '" data-name="' +
                menu_item.name +
                '" data-type="group">Sửa</i>' +
                '<i class="remove-menu" data-id="' +
                key +
                '">Xoá</i>' +
                "</div>" +
                "</div>";
            html += '<ol class="dd-list">';

            // Đệ quy gọi lại hàm stringHtml cho các phần tử con
            $.each(menu_item.child, function (key1, child) {
                html += stringHtml(child, key1); // Gọi đệ quy cho các phần tử con
            });

            html += "</ol>";
            html += "</li>";
        }

        return html;
    }

    function updateMenu() {
        $.ajax({
            url: "http://127.0.0.1:8000/client/menu/get-menu", // URL của API
            type: "GET", // Phương thức GET
            dataType: "json", // Dữ liệu trả về dưới dạng JSON
            success: function (response) {
                if (response.menus) {
                    // Gọi hàm stringHtml để tạo HTML từ dữ liệu trả về
                    var menuHtml = "";
                    $.each(response.menus, function (key, menu) {
                        menuHtml += stringHtml(menu, key); // Gọi hàm stringHtml để tạo HTML
                    });
                    // Thêm HTML vào phần tử có id là 'menu'
                    $("#link-list").html(menuHtml);
                }
            },
            error: function (xhr, status, error) {
                // Xử lý khi có lỗi
                console.error("Error:", error);
            },
        });
    }

    updateMenu();

    $("#store-group").on("submit", function (e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của form
        var type = $("#store-group").attr("data-type");
        var formData = $(this).serialize(); // Chuyển dữ liệu form thành chuỗi URL encoded
        updateSort();
        postAjax("menu/insert/group", formData, function (response) {
            // Thêm phần tử <li> vào danh sách

            $("#dialogGroup").hide();

            updateMenu();
        });
    });

    $(document).on("click", ".remove-link", function () {
        var _token = $('meta[name="csrf-token"]').attr("content");
        var id = $(this).attr("attribute-id");
        var params = {
            _token: _token,
            id: id,
        };

        loading = true;
        postAjax("removeAjax", params, function (r) {
            if (r && r.result && r.result.redirect_url) {
                window.location.href = r.result.redirect_url;
                loading = false;
            } else {
                if (r && r.status !== 200) {
                    loading = false;
                    showNotification(r.message, "error");
                    errors = r.result;
                } else {
                    location.reload();
                }
            }
        });
    });

    // Nestable
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target);
        var output = list.data("output");
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable("serialize")));
            sorted_links = list.nestable("serialize");
        }
    };
    $("#links").nestable().on("change", updateOutput);
    updateOutput($("#links").data("output", $("#links-output")));
});
