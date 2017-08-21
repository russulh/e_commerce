<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    //
    public function admin()
    {
      return $this->belongsTo(Admin::Class);
    }

    public function item()
    {
      return $this->belongsTo(Item::Class);
    }
}
