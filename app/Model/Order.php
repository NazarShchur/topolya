<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public function pavilion(){
        return $this->hasOne("App\Model\Pavilion");
    }
}
