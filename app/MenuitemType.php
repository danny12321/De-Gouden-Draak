<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuitemType extends Model
{
    protected $fillable = [
        'type'
    ];

    public $timestamps = false;

    public function Menuitems()
    {
        return $this->hasMany('App\Menuitem', 'menuitem_type_id', 'id');
    }
}
