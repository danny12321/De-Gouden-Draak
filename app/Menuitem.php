<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuitem extends Model
{
    protected $fillable = [
        'menunumber',
        'name',
        'description',
        'price',
        'specialty',
        'menuitem_type_id'
    ];

    public $timestamps = false;

    //
    public function MenuitemType()
    {
        return $this->hasOne('App\MenuitemType', 'id', 'menuitem_type_id');
    }
}
