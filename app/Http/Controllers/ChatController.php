<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Customer;
use App\Models\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function createChat(Request $request)
    {   
        $request->validate([ // Kiểm tra user_one_id tồn tại trong bảng users
            'user_two_name' => 'required|string', // Kiểm tra tên khách hàng
            'user_two_phone' => 'required|string', // Kiểm tra số điện thoại (không bắt buộc)
            'user_two_email' => 'required|email', // Kiểm tra email (không bắt buộc)
            'description' => 'nullable|string', // Kiểm tra mô tả cuộc trò chuyện
        ]);

         // Kiểm tra xem khách hàng có tồn tại không
        $customer = Customer::where('email', $request->user_two_email)
        ->orWhere('phone', $request->user_two_phone)
        ->first();
        

        // Nếu khách hàng không tồn tại, tạo mới khách hàng
        if (!$customer) {
            $customer = Customer::create([
            'name' => $request->user_two_name,
            'phone' => $request->user_two_phone,
            'email' => $request->user_two_email,
            ]);
        }
        
        $chat = Chat::firstOrCreate(
            [
                'user_two_id' => $customer->id,
            ],
            [
                'user_two_id' => $customer->id,
                'from_ip' => $request->ip(),
                'description' => $request->description,
            ]
        );
        dd($chat);
        return response()->json(['chat' => $chat], 200);
    }
    public function sendMessage(Request $request): JsonResponse|mixed
    {   
     
        $message = Message::create([
            'chat_id' => $request->chat_id,
            'from_user_id' => $request->id,
            'from_user_type' => $request->type,
            'message' => $request->message,
        ]);
        
        broadcast(new MessageSent($message))->toOthers();
        return response()->json(['message' => $message]);
    }

    public function getMessages($chatId)
    {
        $messages = Message::where('chat_id', $chatId)->get();
        return response()->json(['messages' => $messages]);
    }
}
