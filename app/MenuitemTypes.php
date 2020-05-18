<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuitemTypes extends Model
{
    //

    public function Menuitems()
    {
        return $this->hasMany('App\Menuitem', 'menuitem_type_id', 'id');
    }
}
