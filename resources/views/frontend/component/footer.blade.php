<style>
    .chat-container {
        position: fixed;
        right: 30px;
        z-index: 3000;
        bottom: 22px;
        display: none;
        width: 100%;
        max-width: 400px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    #chat-contact-vr{
        right: 220px;
        bottom: 25px;
    }
    @media screen and (max-width: 600px) {
        .chat-container {
            right: 0px;
        }
        #chat-contact-vr{
        right: 220px;
        bottom: 12px;
    }
    }

    .chat-header {
        display: flex;
        border-radius: 9px 10px 0px 0;
        justify-content: space-between;
        align-items: center;
        padding: 16px;
        background-color: #f3f4f6;
        border-bottom: 1px solid #e5e7eb;
    }

    .chat-header .avatar {
        display: flex;
        align-items: center;
    }

    .chat-header .avatar img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .chat-header .avatar .info {
        margin-left: 8px;
    }

    .chat-header .avatar .info p {
        margin: 0;
    }

    .chat-header .avatar .info .name {
        font-size: 14px;
        font-weight: bold;
    }

    .chat-header .avatar .info .status {
        font-size: 12px;
        color: #10b981;
    }

    .chat-header .icons {
        display: flex;
        align-items: center;
    }

    .chat-header .icons i {
        color: #6b7280;
        font-size: 16px;
    }

    .chat-body::-webkit-scrollbar {
        width: 0px;
        /* Ẩn thanh cuộn */
    }

    .chat-body {
        padding: 16px;
        display: flex;
        flex-direction: column-reverse;
        /* Đảo chiều của các phần tử con */
        overflow-y: auto;
    }

    .chat-body .message {
        display: flex;
        justify-content: flex-end;
        /* Căn phải */
        margin-left: auto;
        align-items: center;
        margin-bottom: 8px;
        max-width: 80%;
        border-radius: 4px;
        padding: 10px;
    }

    .chat-body .response {
        display: flex;
        justify-content: flex-start;
        /* Căn trái */
        align-items: center;
        margin-bottom: 8px;
        max-width: 80%;
        border-radius: 4px;
        padding: 10px;
        margin-right: auto;

    }


    .chat-body .message .text {
        background-color: #ef4444;
        color: white;
        font-size: 12px;
        border-radius: 12px;
        padding: 4px 8px;

    }

    .chat-body .message .time {
        font-size: 12px;
        color: #6b7280;
        margin-left: 8px;
    }

    /* .chat-body .response {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 8px;

        margin-bottom: 16px;
    } */

    .chat-body .response .text {
        background-color: #f3f4f6;

        font-size: 12px;
        border-radius: 12px;
        padding: 12px;
    }

    .chat-body .response .time {
        font-size: 12px;
        color: #6b7280;
        margin-right: 8px;
    }

    .chat-body .buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .chat-body .buttons button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        font-size: 14px;
        cursor: pointer;
    }

    .chat-body .buttons button i {
        color: #ef4444;
        margin-right: 8px;
    }

    .chat-footer {
        display: flex;
        align-items: center;
        padding: 16px;
        border-top: 1px solid #e5e7eb;
    }

    .chat-footer input {
        flex: 1;
        padding: 8px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
    }

    .chat-footer button {
        background: none;
        padding-left: 6px;
        padding-right: 6px;
        border: none;
        color: #3b82f6;
        font-size: 16px;
        margin-left: 8px;
        cursor: pointer;
    }
</style>
<div class="chat-container" id="chat-container">
    <div class="chat-header">
        <div class="avatar">
            <img src="https://storage.googleapis.com/a1aa/image/TikMHMcGLneuPJ4Z2w1EAImG-4G8hW_HYlooIFL-IBI.jpg" alt="Assistant Avatar">
            <div class="info">
                <p class="name">Trợ lý ảo </p>
                <p class="status">Online</p>
            </div>
        </div>
        <div class="icons close-chat" style="cursor: pointer;">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="chat-body" id="chat-body" style="height:350px">


    </div>
    <div class="chat-footer">
        <input type="text" id="input-send" placeholder="Nhập nội dung cần hỗ trợ">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <button id="send-btn">
            <img width="30" src="{{asset('Frontend\images\send_icon.png')}}" alt="">
        </button>
    </div>
</div>
<div id="chat-contact-vr" class="button-contact-vr" >
    <div id="chat-online">
        <div class="phone-vr phone-dk">
            <button class="btn btn-primary m57-form-btn-show" style="     padding: 2px;
    height: auto;
    border-radius: 50px;    background: #9ad9e9c9;
    border: 0;    margin-bottom: 5px;">
                <img src="{{asset('Frontend/images/chat_icon.png')}}" width="50" alt="">
            </button>
        </div>
    </div>
</div>
<div id="button-contact-vr" class="button-contact-vr">
    <div id="gom-all-in-one">
        <div class="phone-vr phone-dk">
            <a href="{{route('user.register')}}" class="btn btn-primary m57-form-btn-show">
                Đăng ký ngay
            </a>
        </div>
    </div>
</div>
<footer id="bottom" class="site-bottom gw10">
    <div class="footer-area">
        <div class="container">
            <div class="footer-content">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-12 text-left">
                        <div class="mb15">
                        <h3 style="margin-bottom: 0;">CLB DOANH NHÂN TRÀ VINH TẠI TP.HCM</h3>
                        <h3 style="padding-top: 0;">VỮNG VÀNG KẾT NỐI - ĐỒNG LÒNG PHÁT TRIỂN</h3>
                            <p style="color: #ffffff !important; font-size: 14px !important;">
                                <strong>Địa chỉ trụ sở chính:</strong> {{config('info.address')}}<br />
                                <strong>Hotline:</strong> {{config('info.phone')}}<br />
                                <strong>Website:</strong> {{config('info.website')}}<br />
                                <strong>Email:</strong> <a
                                    href="mailto:{{config('info.email')}}">{{config('info.email')}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <div class="mb15">
                            <div class="social">
                                <a href="{{config('info.facebook')}}" title="facebook"
                                    class="social-profile" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <!-- <a href="{{config('info.youtube')}}" title="youtube"
                                    class="social-profile" target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
                                </a> -->
                            </div>
                        </div>
                        <p>© 2025 CLB DOANH NHÂN TRÀ VINH TẠI TP.HCM</p>
                        <p>VỮNG VÀNG KẾT NỐI - ĐỒNG LÒNG PHÁT TRIỂN.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>