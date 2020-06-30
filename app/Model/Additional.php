<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    public $timestamps = false;

    public function add_orders(){
        return $this->hasMany("App\Model\AdditionalOrder");
    }
}
