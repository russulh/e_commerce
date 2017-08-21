<?php

namespace App\Http\Controllers\web\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use Auth;

class PageController extends Controller
{
    /**
     * [index is use for view of home page]
     * @return [object] [categorties & items pass to view]
     */
    public function index()
    {
      $items            =  Item::with('category','item_images')->get();
      $items_paginate   =  Item::with('category','item_images')->paginate(21);
      return view('v1.pages.home',compact('items', 'items_paginate'));
    }

    /**
     * [signin its for view the page of sign in]
     * @return [type] [view]
     */
    public function signin()
    {
      return view('v1.pages.sign_in');
    }

    /**
     * [signup its for view the page of sign up]
     * @return [type] [view]
     */
    public function signup()
    {
      return view('v1.pages.sign_up');
    }

    /**
     * [category its for return all items that belongs to a category]
     * @param  [integer] $id [category id]
     * @return [type]     [description]
     */
    public function category($id)
    {
      $category            =  Category::with('items')->where('id', $id)->get();
      $category_paginate   =  Item::where('category_id', $id)->paginate(21);
      return view('v1.pages.category',compact('category', 'category_paginate'));
    }

    /**
     * [profile: view user profile]
     * @return [object]        [Auth:user]
     */
    public function profile()
    {
      if(Auth::user()){
         $user =  Auth::user();
         return view('v1.pages.profile',compact('user'));
      }
      return redirect('/');
    }

    public function addresses()
    {
      $user =  Auth::user()->with('addresses')->get();
      // $addresses  =  $user[0]->addresses;
      // return var_dump($addresses);
      return view('v1.pages.addresses',compact('user'));
    }
}
