<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxiOrder extends Model
{
    use HasFactory;
    protected $with = ["vehicle_type"];

    public function vehicle_type()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicle_type_id', 'id');
    }
}
