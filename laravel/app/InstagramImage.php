<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramImage extends Model
{
    // Länka modellen till en annan tabell
    //protected $table = 'my_customers';

    // Primary key-kolumnen antas vara id
    //protected $primaryKey = 'id';

    // Primary key-kolumnen antas vara auto-inkrementerande
    public $incrementing = false;

    // Laravel sköter timestamps åt dig om du inte säger nej
    public $timestamps = false;

    protected $fillable = [
        "id",
        "url"
    ];
}