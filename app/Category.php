<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function admin()
    {
      return $this->belongsTo(Admin::Class);
    }

    public function items()
    {
      return $this->hasMany(Item::Class, 'category_id','id');
    }
}
