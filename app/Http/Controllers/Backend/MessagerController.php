<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Chat;


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
}
