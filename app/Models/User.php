<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Module\Mass\Models\BazarList;
use Module\Mass\Models\Member;
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


    public function scopeMass($query)
    {
        if (auth()->id() == 1) {
            return;
        }
        return $query->where('id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->mass_id);
    }


    // public function businessInfo()
    // {
    //     BusinessSetting::where('id', auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->dokan_id)->first();
    //     return $this->belongsTo(BusinessSetting::class, 'dokan_id','user_id');
    // }




    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->where('status', 1);
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'user_id');
    }

    public function bazar()
    {
        return $this->hasOne(BazarList::class, 'created_by');
    }
}
