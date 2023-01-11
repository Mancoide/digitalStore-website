<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable =[
        'date',
        'account_id',
        'type_movement',
        'unitary_cost',
        'package_cost',
        'quantity_profiles',
        'createdBy',
        'status_id',
        'deletedBy',
        'motive'
    ];

    protected $dates = ['date'];


    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    /**
     * Get the created_by that owns the Movement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    /**
     * Get the status that owns the Movement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the deleted_by that owns the Movement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deleted_by()
    {
        return $this->belongsTo(User::class, 'deletedBy');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', 11);
    }

}
