<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'increment_id',
        'created_at',
        'updated_at',
        'customer_id',
        'customer_email',
        'status',
        'marking',
        'grand_total',
        'subtotal',
        'tax_amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method',
        'shipping_amount',
        'shipping_tax_amount',
        'shipping_description',
        ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function orderItem() {
        return$this->hasMany(OrderItem::class);
    }
    public function billingAddress() {
        return $this->hasOne(BillingAddress::class, 'billing_address_id', 'id');
    }
    public function shippingAddress() {
        return $this->hasOne(ShippingAddress::class,'shipping_address_id', 'id');
    }
}
