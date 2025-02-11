<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class MessagerController extends Controller
{
    public function index(){
       
        $chats = Chat::with(['userTwo','messages' => function ($query) {
            $query->orderBy('created_at', 'asc')->first(); // Sắp xếp theo tin nhắn mới nhất (theo `created_at`)
        }])->get();
        $template = 'backend.messager.index';
        $config['method']='create';
        $config['js']=[
            'Backend/js/messager.js'
        ];
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config','chats'));
    }
    public function getMessages($chatId){
        $chat = Chat::with(['messages', 'userTwo'])->find($chatId);
        
        if (!$chat) {
            return response()->json(['error' => 'Chat not found'], 404);
        }
        return response()->json([
            'user' => $chat->userTwo,
            'messages' => $chat->messages
        ]);
    }
    public function removeChat(Request $request)
    {
        // Validate đầu vào
        $validated = $request->validate([
            'chatId' => 'required|integer|exists:chats,id', // Đảm bảo chatId tồn tại
        ]);
    
        try {
            // Lấy thông tin cuộc trò chuyện
            $chat = Chat::findOrFail($validated['chatId']);
    
            // Bắt đầu transaction để đảm bảo an toàn dữ liệu
            DB::beginTransaction();
    
            // Xóa tất cả tin nhắn liên quan
            $chat->messages()->delete();
    
            // Xóa cuộc trò chuyện
            $chat->delete();
    
            // Hoàn tất transaction
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa cuộc trò chuyện và tất cả tin nhắn liên quan thành công.',
            ]);
        } catch (\Exception $e) {
            // Rollback nếu có lỗi
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi khi xóa cuộc trò chuyện: ' . $e->getMessage(),
            ], 500);
        }
    }
    
}
