<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'firstname',
        'lastname',
        'gender',
        'customer_activated',
        'group_id',
        'customer_company',
        'default_billing',
        'default_shipping',
        'is_active',
        'customer_extra_text',
        'customer_due_date_period',
    ];
}