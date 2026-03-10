<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function store(Request $request, Conversation $conversation){
        $validated = $request->validate([
            'message' => 'required|max:1000|string',
        ]);

        $new_message = $conversation->messages()->create([
            'sender_id' => auth()->id(),
            'message' => $validated['message'],
        ]);

        MessageSent::dispatch($new_message, $conversation->id);
        return response()->json($new_message);
    }

    public function getChatData(Conversation $conversation){
        
        $messages = Chat::where('conversation_id', $conversation->id)->orderBy('created_At', 'desc')->get();

        return response()->json($messages);
    }

    
    public function createConversation(Request $request){
        $validated = $request->validate([
            'sender_id' => 'integer|required',
            'receiver_id' => 'integer|required',
        ]);

        $conversation = Conversation::where([
            ['sender_id','=', $validated['sender_id']],
            ['receiver_id','=', $validated['receiver_id']]
            ])->orWhere([
                ['sender_id','=', $validated['receiver_id']],
                ['receiver_id','=', $validated['sender_id']]
            ])->first();

        if(empty($conversation)){
            $conversation = Conversation::create([
                'sender_id' => $validated['sender_id'],
                'receiver_id' => $validated['receiver_id'],
            ]);

        return response()->json([
            'conversation_id' => $conversation->id,
        ]);

        };
    }

    public function getConversations(Request $request){
        $validated = $request->validate([
            'user_id' => 'required|integer'
        ]);

        $get_conversations = Conversation::where([
                ['sender_id','=', $validated['user_id']],
            ])->orWhere([
                ['receiver_id','=', $validated['user_id']]
        ])
        ->get()
        ->map(fn($c)=>[
            'opponent' => User::find($c->opponent($validated['user_id'])),
            'conversation_id' => $c->id,
            'latest_chat' => Chat::getLatestChat($c->id)
        ]);



        if ($get_conversations->isEmpty()) return response()->json([]);

        return response()->json($get_conversations);
    }
}
