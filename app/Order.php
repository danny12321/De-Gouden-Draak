<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'guest_id',
    ];

    public $timestamps = false;
}
