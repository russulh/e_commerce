<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function admin()
    {
      return $this->belongsTo(Admin::Class);
    }

    public function category()
    {
      return $this->belongsTo(Category::Class);
    }

    public function item_images()
    {
      return $this->hasMany(ItemImage::Class,'item_id','id');
    }

    public function orders()
    {
		return $this->belongsToMany(Order::Class);
	 }
}
