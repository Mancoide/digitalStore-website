<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_date',
        'email',
        'password',
        'product_id',
        'package_id',
        'accounts_available',
        'cost',
        'description',
        'seller_id',
        'status_id',
        'createdBy',
        'deletedBy',
        'motive'
    ];

    protected $dates = ['subscription_date'];

    public function setSubscriptionDateAttribute($date)
    {
        $this->attributes['subscription_date'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    /**
     * Get the product that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the package that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the status that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the created_by that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    /**
     * Get the deleted_by that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deleted_by()
    {
        return $this->belongsTo(User::class, 'deletedBy');
    }

    /**
     * Get the seller that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', 13);
    }
}
