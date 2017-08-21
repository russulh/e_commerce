<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function address()
    {
      return $this->belongsTo(UserAddress::Class);
    }

    public function user()
    {
      return $this->belongsTo(User::Class);
    }

    public function admin()
    {
      return $this->belongsTo(Admin::Class);
    }

    public function items()
    {
		return $this->belongsToMany(Item::Class);
	 }
}
