<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function guests() 
    {
        return $this->hasMany('App\Guest');
    }

    public function latestGuest()
    {
        return $this->hasOne('\App\Guest')->latest();
    }

    public function lastGuest()
    {
        return $this->guests()->get()->last();
    }
}
