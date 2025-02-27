$(document).ready(function () {

    function sendMessage(chatId, senderId, message) {
        const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
        $.ajax({
            url: appUrl+"/messages",
            type: "POST",
            data: JSON.stringify({
                chat_id: chatId,
                id: senderId,
                type: "User",
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
    function openChat(chatId,clientId) {
        // Gửi yêu cầu AJAX để lấy thông tin cuộc trò chuyện
        $.ajax({
            url: `./get-chat-messages/${chatId}`, // URL API để lấy tin nhắn
            method: "GET",
            success: function (data) {
                // Cập nhật tên cuộc trò chuyện
                $("#chat-name p").text(data.user.name);
                $("#chat-name").attr("data-id", chatId);
                $("#chat-name").attr("client-id", clientId);
                // Tải các tin nhắn
                let chatMessages = $("#chat-messages");
                chatMessages.empty(); // Xóa các tin nhắn cũ trước khi thêm tin nhắn mới

                data.messages.forEach(function (message) {
                    // Kiểm tra loại người gửi tin nhắn
                    console.log(message.from_user_type);

                    let messageElement;

                    if (message.from_user_type === "Customer") {
                        // Tạo phần tử tin nhắn khi từ người dùng là khách hàng
                        messageElement = $(`
                            <div class="message sent">
                                <span class="time">23:15</span>
                                <div class="message-content">
                                    <p>${message.message}</p> <!-- Chèn nội dung tin nhắn vào đây -->
                                </div>
                            </div>
                        `);
                    } else {
                        // Tạo phần tử tin nhắn khi từ người dùng là người khác
                        messageElement = $(`
                            <div class="message response">
                                <div class="message-content">
                                    <p>${message.message}</p> <!-- Chèn nội dung tin nhắn vào đây -->
                                </div>
            <span class="time">23:15</span>
                                
                            </div>
                        `);
                    }

                    // Thêm tin nhắn vào hộp thoại
                    chatMessages.append(messageElement);
                });
                $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);

                // Hiển thị hộp thoại chat
                $("#chat-box").show();
            },
            error: function (error) {
                console.log("Error fetching chat messages:", error);
            },
        });
    }
    function closeChat() {
        // Ẩn hộp thoại chat
        $("#chat-box").hide();
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
        $("#input-send").val(""); // Xóa giá trị trong input sau khi lấy
        
        // Nếu không có nội dung, không thực hiện gửi
        if (message === "") {
            alert("Vui lòng nhập nội dung tin nhắn!");
            return;
        }

        // Lấy thông tin chat_id và sender_id từ sessionStorage
        const chatId = parseInt($("#chat-name").attr("data-id"), 10); // Lấy chat_id từ sessionStorage
        const senderId = parseInt($("#chat-name").attr("client-id"), 10); // Lấy sender_id từ sessionStorage

        // Nếu không có chat_id hoặc sender_id, thông báo lỗi
        if (!chatId || !senderId) {
            alert("Không tìm thấy thông tin chat_id hoặc sender_id!");
            return;
        }

        // Gọi hàm sendMessage
        console.log("Chatid: ",chatId);
        console.log("senderId: ",senderId);
        sendMessage(chatId, senderId, message);

        // Xóa giá trị trong input sau khi gửi
        
    });
    $(document).on("click", ".remove-chat", function () {
        var chatId = $(this).data("id");
    
        if (confirm("Bạn có chắc chắn muốn xóa cuộc trò chuyện này không?")) {
            $.ajax({
                url: 'messager/remove',
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                    chatId: chatId
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        // Loại bỏ dòng tương ứng khỏi giao diện
                        $(this).closest(".chat-item").remove();
                    } else {
                        alert("Lỗi: " + response.message);
                    }
                },
                error: function (xhr) {
                    alert("Đã xảy ra lỗi: " + xhr.responseJSON.message);
                }
            });
        }
    });
    
    $(document).on("click", ".chat-item", function () {
        var id = $(this).attr("data-id");
        var clientId = $(this).attr("client-id");
        console.log("id ", id);
        openChat(id,clientId);
        Pusher.logToConsole = true;

        // Khởi tạo Pusher với app key và cluster
        var pusher = new Pusher("eff46362154a816a511e", {
            cluster: "ap1",
        });

        // Lấy chat_id từ sessionStorage và kiểm tra
        var chatId = id;
        if (!chatId) {
            console.error("Chat ID không tìm thấy trong sessionStorage");
        } else {
            // Tạo tên kênh và đăng ký kênh
            var stringChanel = "chat." + chatId;
            console.log("Đang đăng ký kênh:", stringChanel);

            var channel = pusher.subscribe(stringChanel);
            var type = "";
            // Lắng nghe sự kiện MessageSent
            channel.bind("App\\Events\\MessageSent", function (data) {
                if (data.message.from_user_type === "Customer") {
                    type = "response";
                    $("#chat-messages").append(
                        `
                            <div class="message sent">
                                <span class="time">23:15</span>
                                <div class="message-content">
                                    <p>${data.message.message}</p> <!-- Chèn nội dung tin nhắn vào đây -->
                                </div>
                            </div> `);
                } else {
                    type = "message";

                    $("#chat-messages").append(
                            `<div class="message response">
                                <div class="message-content">
                                    <p>${data.message.message}</p> <!-- Chèn nội dung tin nhắn vào đây -->
                                </div>
                                <span class="time">23:15</span>
                                
                            </div>
                        `
                    );
                    $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
                }
                console.log("Message received:", data.message.message);
                // Xử lý tin nhắn ở đây, ví dụ: hiển thị lên giao diện người dùng
            });
        }
    });
});
