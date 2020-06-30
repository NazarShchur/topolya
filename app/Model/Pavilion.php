<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Pavilion extends Model
{
    public $timestamps = false;

    public function orders() {
        return $this->hasMany("App\Model\Order");
    }
}
