<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['sender_id', 'receiver_id'];
    public function messages(){
        return $this->hasMany(Chat::class);
    }

    public function opponent($user_id){
        return $this->sender_id == $user_id ? $this->receiver_id : $this->sender_id;
    }
}
