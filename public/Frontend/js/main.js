jQuery(document).ready(function ($) {
    // Mã sẽ chạy sau khi tài liệu HTML đã được tải hoàn toàn
    $(document).on("click", "#chat-contact-vr", function () {
        // Ẩn nút #button-contact-vr
        $('#button-contact-vr').hide();
        // Ẩn phần tử #chat-contact-vr
        $(this).hide();
        // Hiển thị phần tử #chat-container
        $('#chat-container').show();
    });
    $(document).click(function(event) {
        // Kiểm tra nếu click không phải bên trong #chat-container
        if (!$(event.target).closest('#chat-container').length && !$(event.target).closest('#chat-contact-vr').length) {
            $('#chat-container').hide();
            $('#button-contact-vr').show();
            $('#chat-contact-vr').show();
        }
    });
    $(document).on("click", ".close-chat", function () {
        // Ẩn nút #button-contact-vr
        $('#chat-container').hide();
        $('#button-contact-vr').show();
            $('#chat-contact-vr').show();
        
    });
});