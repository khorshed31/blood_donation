<?php

namespace Module\Blood\Models;

use App\Models\Model;
use App\Models\User;

class ChatList extends Model
{
    

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }


    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }   


}
