<link href="{{ asset('Backend/css/messager.css')}}" rel="stylesheet">

<div class="app-content">
    <div class="container" style="height: calc(100vh - 131px);">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h1>Đoạn chat</h1>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Tìm kiếm trên Messenger">
            </div> -->
            
            <div class="chat-list">
                @if(isset($chats))
                @foreach($chats as $chat)
               
                <div class="chat-item" data-id="{{$chat->id}}" client-id="{{ Auth::user()->id }}">
                    <img src="https://placehold.co/40x40" alt="Profile picture of Lan Dang">
                    <div class="chat-info">
                        <p class="name">{{ $chat->userTwo->name }}</p>

                        <p class="message">
                            {{ \Illuminate\Support\Str::limit($chat->messages->first()->message ?? 'Không có tin nhắn', 20, '...') }}
                        </p>

                        <p class="time">
                            {{ $chat->messages->first() ? $chat->messages->first()->created_at->diffForHumans() : 'Chưa có thời gian' }}
                        </p>

                    </div>
                    <button type="button" data-id="{{$chat->id}}" class="remove-chat el-button is-circle"><!----><i class="el-icon-delete"></i><!----></button>

                </div>
                @endforeach
                @endif
             
                
            </div>
        </div>
        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header">
                <div class="chat-title" id="chat-name">
                    <img src="https://placehold.co/40x40" alt="Profile picture of Phuong Dang">
                    <p>None</p>
                </div>
                <div class="chat-actions">
                    <i class="fas fa-phone"></i>
                    <i class="fas fa-video"></i>
                    <i class="fas fa-info-circle"></i>
                </div>
            </div>
            <div class="chat-messages" id="chat-messages">
                
            </div>
            <div class="chat-footer">
                <input type="text" id="input-send" placeholder="Nhập nội dung cần hỗ trợ">
            
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button id="send-btn">
                    <img width="30" src="{{asset('Frontend\images\send_icon.png')}}" alt="">
                </button>
            </div>
        </div>
    </div>
</div>