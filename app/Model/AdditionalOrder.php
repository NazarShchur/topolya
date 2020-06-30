<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdditionalOrder extends Model
{
    public $timestamps = false;

    public function additional(){
        return $this->belongsTo("App\Model\Additional");
    }

    public function order(){
        return $this->belongsTo("App\Model\Order");
    }
}
