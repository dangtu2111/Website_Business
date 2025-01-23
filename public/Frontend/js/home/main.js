jQuery(document).ready(function ($) {
    
    loadMessageHistory();
    // Mã sẽ chạy sau khi tài liệu HTML đã được tải hoàn toàn
    Pusher.logToConsole = true;

    // Khởi tạo Pusher với app key và cluster
    var pusher = new Pusher('eff46362154a816a511e', {
        cluster: 'ap1'
    });

    // Lấy chat_id từ localStorage và kiểm tra
    var chatId = localStorage.getItem("chat_id");
    if (!chatId) {
        console.error('Chat ID không tìm thấy trong localStorage');
    } else {
        // Tạo tên kênh và đăng ký kênh
        var stringChanel = 'chat.' + chatId;
        console.log('Đang đăng ký kênh:', stringChanel);

        var channel = pusher.subscribe(stringChanel);
        var type="";
        // Lắng nghe sự kiện MessageSent
        channel.bind('App\\Events\\MessageSent', function(data) {
            if( data.message.from_user_type==="Customer"){
                type="message";
                $("#chat-body").prepend(
                    `
            <div class="message">

                <div class="text">${data.message.message}</div>
                <span class="time">23:18</span>


            </div>
        `
                );
            }else{
                type="response";

                $("#chat-body").prepend(
                    `
            <div class="response">
                <span class="time">23:18</span>

                <div class="text">${data.message.message}</div>


            </div>
        `);
        saveMessageHistory(data.message.message, type);


        $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight);
            }
            console.log('Message received:', data.message.message);
            // Xử lý tin nhắn ở đây, ví dụ: hiển thị lên giao diện người dùng
        });
    }
    $("#input-send").on("keypress", function (event) {
        if (event.which === 13) { // Kiểm tra phím Enter
            event.preventDefault(); // Ngăn hành vi mặc định của Enter
            $("#send-btn").trigger("click"); // Kích hoạt sự kiện Click của nút send-btn
        }
    });
    $(document).on("click", "#send-btn", function () {
        if ($("#input-send").val() == "") {
            return;
        }
        var message = $("#input-send").val(); // Lấy giá trị từ input
        $("#input-send").val(""); 

        // Nếu không có nội dung, không thực hiện gửi
        if (message === "") {
            alert("Vui lòng nhập nội dung tin nhắn!");
            return;
        }

        // Lấy thông tin chat_id và sender_id từ localStorage
        const chatId = localStorage.getItem("chat_id"); // Lấy chat_id từ localStorage
        const senderId = localStorage.getItem("clientId"); // Lấy sender_id từ localStorage

        // Nếu không có chat_id hoặc sender_id, thông báo lỗi
        if (!chatId || !senderId) {
            alert("Không tìm thấy thông tin chat_id hoặc sender_id!");
            return;
        }

        // Gọi hàm sendMessage
        sendMessage(chatId, senderId, message);
        saveMessageHistory(message,"message");
 
    });
    
    function sendMessage(chatId, senderId, message) {
        const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');

        $.ajax({
            url: appUrl+"/messages",
            type: "POST",
            data: JSON.stringify({
                chat_id: chatId,
                id: senderId,
                type: "Customer",
                message: message,
                _token: $("#token").val(),
            }),
            contentType: "application/json",
            headers: {
                "X-CSRF-TOKEN": $("#token").val(),
            },
            success: function (response) {
                console.log("Message sent:", response);
            },
            error: function (error) {
                console.error("Error sending message:", error);
            },
        });
    }
    $(document).on("click", "#chat-contact-vr", function () {
        // Ẩn nút #button-contact-vr
        $("#button-contact-vr").hide();
        // Ẩn phần tử #chat-contact-vr
        $(this).hide();
        // Hiển thị phần tử #chat-container
        $("#chat-container").show();
        var customerInfo = JSON.parse(localStorage.getItem("customer_info")); // Sử dụng sessionStorage nếu bạn muốn lưu trong session

        if (customerInfo) {
            // Kiểm tra nếu có thông tin khách hàng
            console.log("Tên khách hàng: " + customerInfo.name);
            console.log("Số điện thoại: " + customerInfo.phone);
            console.log("Email: " + customerInfo.email);
        } else {
            console.log("Không tìm thấy thông tin khách hàng.");
            // Tạo một HTML yêu cầu khách hàng nhập thông tin
            var html = `
        <div class="response">
            <span class="time">23:15</span>
            <div class="text">Tôi không có thông tin của bạn. Vui lòng cung cấp:</div>
        </div>
    `;
            $("#chat-body").prepend(html);

            // Tạo một thẻ input và thêm vào chat để khách hàng nhập thông tin
            var inputHtml = `
        <div class="form">
            
            
            <input type="text" id="customer-name-input" placeholder="Nhập tên của bạn" class="form-control" style="margin-bottom:18px">
            <input type="text" id="customer-phone-input" placeholder="Nhập số điện thoại của bạn" class="form-control"  style="margin-bottom:18px">
            <input type="email" id="customer-email-input" placeholder="Nhập email của bạn" class="form-control"  style="margin-bottom:18px"s>
            <input type="text" id="customer-description-input" placeholder="Nhập yêu cầu của bạn" class="form-control"  style="margin-bottom:18px"s>

            <button id="save-customer-info" class="btn btn-primary">Lưu thông tin</button>

        </div>
    `;

            // Thêm phần nhập thông tin vào chat body
            $("#chat-body").prepend(inputHtml);

            // Khi nhấn nút "Lưu thông tin"
            $(document).on("click", "#save-customer-info", function () {
                var name = $("#customer-name-input").val();
                var phone = $("#customer-phone-input").val();
                var email = $("#customer-email-input").val();
                var yeucau = $("#customer-description-input").val();

                // Kiểm tra nếu tất cả các trường đã có giá trị
                if (name && phone && email && yeucau) {
                    var customer = {
                        name: name,
                        phone: phone,
                        email: email,
                        description: yeucau,
                    };

                    // Lưu thông tin vào localStorage
                    localStorage.setItem(
                        "customer_info",
                        JSON.stringify(customer)
                    );

                    $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight);
                    var htmlxx = `
                            <div class="response">
                                <span class="time">23:18</span>
                                <div class="text">Cảm ơn bạn! Vui lòng đợi một chút để chúng tôi kết nối với bộ phận CSKH .</div>
                            </div>
                        `;

                    $("#chat-body").prepend(htmlxx);
                    saveMessageHistory(
                        "Cảm ơn bạn! Vui lòng đợi một chút để chúng tôi kết nối với bộ phận CSKH .",
                        "response"
                    );
                    var datax = {
                        user_two_name: name,
                        user_two_phone: phone,
                        user_two_email: email,
                        description: yeucau,
                        _token: $("#token").val(), // CSRF token (nếu cần)
                    };
                    const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');

                    $.ajax({
                        url: appUrl+"/chats", // Đường dẫn đến route của Laravel
                        type: "POST",
                        data: datax,
                        success: function (response) {
                            // Xử lý khi nhận được phản hồi từ server
                            console.log(response);
                            localStorage.setItem("chat_id", response.chat.id);
                            localStorage.setItem(
                                "clientId",
                                response.chat.user_two_id
                            );
                            console.log(
                                "Chat ID đã lưu:",
                                response.chat.user_two_id
                            );
                            if (response.chat) {
                                alert(
                                    "Cuộc trò chuyện đã được tạo thành công!"
                                );
                            } else {
                                alert("Có lỗi xảy ra khi tạo cuộc trò chuyện.");
                            }
                        },
                        error: function (xhr, status, error) {
                            // Xử lý lỗi nếu có
                            console.error("Lỗi:", error);
                            alert(
                                "Có lỗi xảy ra trong quá trình tạo cuộc trò chuyện."
                            );
                        },
                    });
                } else {
                    alert("Vui lòng điền đầy đủ thông tin.");
                }
            });
        }
    });

    // Hàm lưu lịch sử tin nhắn vào localStorage
    function saveMessageHistory(message, type) {
        // Kiểm tra nếu message_history đã có trong localStorage, nếu không thì khởi tạo nó
        var messageHistory =
            JSON.parse(localStorage.getItem("message_history")) || [];

        // Thêm tin nhắn mới vào lịch sử
        messageHistory.push({ message: message, type: type });

        // Lưu lại lịch sử tin nhắn vào localStorage
        localStorage.setItem("message_history", JSON.stringify(messageHistory));
    }
    function loadMessageHistory() {
        var messageHistory =
            JSON.parse(localStorage.getItem("message_history")) || [];
        messageHistory.forEach(function (item) {
            var html = `<div class="${item.type}">`;
            if (item.type == "response")
                html += `<span class="time">23:18</span><div class="text">${item.message}</div>`;
            else {
                html += `<div class="text">${item.message}</div><span class="time">23:18</span>`;
            }
            html += `</div>`;
            $("#chat-body").prepend(html);
        });
        // Cuộn xuống dưới cùng của chat
        $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight);
    }

    // Biến cờ để kiểm tra lần click đầu tiên
});
