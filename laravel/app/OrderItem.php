<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'order_id',
        'item_id',
        'created_at',
        'updated_at',
        'name',
        'sku',
        'qty',
        'price',
        'tax_amount',
        'row_total',
        'price_incl_tax',
        'total_incl_tax',
        'tax_percent',
        'amount_package',
    ];

    public function item() {
        return $this->belongsTo(Order::class);
    }
}
