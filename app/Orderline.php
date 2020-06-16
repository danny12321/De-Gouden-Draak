<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    protected $fillable = [
        'amount',
        'description',
        'menuitem_id',
        'order_id',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function menuitem()
    {
        return $this->hasOne('App\Menuitem', 'id', 'menuitem_id');
    }
}
