<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    public function admin()
    {
      return $this->belongsTo(Admin::Class);
    }

}
