<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['message', 'sender_id', 'conversation_id', 'is_read'];
    protected $hidden = ['updated_at'];

    public function conversation(){
        $this->hasOne(Conversation::class);
    }

    public static function getLatestChat($conversation_id){
        return self::where('conversation_id',$conversation_id)->orderBy('created_At', 'desc')->first();
    }
}
