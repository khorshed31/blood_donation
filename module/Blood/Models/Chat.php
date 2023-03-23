<?php

namespace Module\Blood\Models;

use App\Models\Model;
use App\Models\User;
use App\Traits\AutoCreatedUpdated;

class Chat extends Model
{
    use AutoCreatedUpdated;



    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }


    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

}
