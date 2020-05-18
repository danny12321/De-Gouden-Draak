<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MenuitemType;

class MenuitemType extends Model
{
    //

    public function Menuitems()
    {
        return $this->hasMany('App\Menuitem', 'menuitem_type_id', 'id');
    }
}
