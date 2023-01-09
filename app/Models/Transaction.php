<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Transaction extends Model
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = [
        'type',
        'user_id',
        'before',
        'amount',
        'after',
        'observation',
        'createdBy'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the create_by that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }
}
