<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    public function customer_info()
    {
        return $this->belongsTo('App\customer_info');

    }
    public function customer_vehicle()
    {
        return $this->belongsTo('App\customer_vehicle');
    }
}
