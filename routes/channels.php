<?php

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('conversation.{id}', function(User $user, $id){
    return true;
    // $conversation = Conversation::find($id);


    // if(!$conversation){
    //     return false;
    // };

    // return $user === $conversation->sender_id || $user === $conversation->receiver_id;
});