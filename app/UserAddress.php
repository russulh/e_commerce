<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    public function user()
    {
      return $this->belongsTo(User::Class);
    }

    public function orders()
    {
      return $this->hasMany(Order::Class, 'user_address_id','id');
    }
}
