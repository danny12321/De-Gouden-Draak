<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    public function Menuitem()
    {
        return $this->hasOne('App\Menuitem', 'id', 'menuitem_id');
    }
}
