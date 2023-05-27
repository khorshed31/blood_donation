<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Module\Blood\Models\Chat;
use Module\Blood\Models\LikePost;
use Module\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   




    public function scopeSearchByField($query, $filed_name)
    {
        $query->when(request()->filled($filed_name), function ($qr) use ($filed_name) {
            $qr->where($filed_name, request()->$filed_name);
        });
    }



    public function scopeLikeSearch($query, $filed_name)
    {
        $query->when(request()->filled($filed_name), function ($qr) use ($filed_name) {
            $qr->where($filed_name, 'like', '%' . request()->$filed_name . '%');
        });
    }



    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->where('status', 1);
    }

    public function like_posts()
    {
        return $this->hasMany(LikePost::class, 'created_by');
    }


    public function chat_receives()
    {
        return $this->hasMany(Chat::class, 'receiver_id')->latest();
    }

    public function chat_receive()
    {
        return $this->hasOne(Chat::class, 'receiver_id');
    }


}
