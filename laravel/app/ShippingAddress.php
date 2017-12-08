<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'customer_id',
        'customer_address_id',
        'email',
        'firstname',
        'lastname',
        'postcode',
        'street',
        'city',
        'telephone',
        'country_id',
        'address_type',
        'company',
        'country',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
