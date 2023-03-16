<?php

namespace Module\Blood\Models;

use App\Models\Model;
use App\Traits\AutoCreatedUpdated;

class Post extends Model
{
    use AutoCreatedUpdated;




    public function scopeActivePost($q){

        return $q->where('status',1);
    }




    public function like_posts()
    {
        return $this->hasMany(LikePost::class, 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }


}
