<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'guest_id',
    ];

    public $timestamps = false;

    public function Orderline()
    {
        return $this->hasMany('App\Orderline', 'order_id', 'id');
    }

    public function guest()
    {
        return $this->hasOne('App\guest', 'id', 'guest_id');
    }
}
