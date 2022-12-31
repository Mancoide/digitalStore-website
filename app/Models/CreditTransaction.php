<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class CreditTransaction extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = ['user_id','amount','balance'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
