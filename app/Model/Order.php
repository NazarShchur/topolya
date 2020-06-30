<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public function pavilion(){
        return $this->belongsTo("App\Model\Pavilion");
    }

    public function additional_orders(){
        return $this->hasMany("App\Model\AdditionalOrder");
    }
}
