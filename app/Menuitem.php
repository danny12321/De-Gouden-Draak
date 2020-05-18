<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuitem extends Model
{
    //
    public function MenuitemType()
    {
        return $this->hasOne('App\MenuitemType', 'id', 'menuitem_type_id');
    }
}
