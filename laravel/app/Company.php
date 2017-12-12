<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'company_name'
    ];
    public function customers() {
        return $this->hasMany(Customer::class);
    }

}
