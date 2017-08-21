<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Model
{
    //
   public function getFullNameAttribute() {
      return $this->first_name . " " . $this->last_name;
   }

   public function categorties()
   {
      return $this->hasMany(Category::Class,'admin_id','id');
   }

   public function items()
   {
      return $this->hasMany(Item::Class,'admin_id','id');
   }

   public function item_images()
   {
      return $this->hasMany(ItemImage::Class,'admin_id','id');
   }

   public function ads()
   {
      return $this->hasMany(Ad::Class, 'admin_id','id');
   }

   public function orders()
   {
      return $this->hasMany(Order::Class, 'admin_id','id');
   }
}
