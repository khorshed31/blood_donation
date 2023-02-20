<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\App;

trait AutoDokanCreated
{

    public static function boot()
    {
        parent::boot();

        if (!App::runningInConsole()) {
            /**
             * Auto create created_by field when create anything through model
             */
            static::creating(function ($model) {
                $model->fill([
                    'mass_id'   => auth()->user()->type == 'owner' ? auth()->id() : auth()->user()->mass_id,
                ]);
            });
        }
    }
}
