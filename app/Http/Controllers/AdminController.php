<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    //
    public function getAdmins()
    {
      $admins  =  Admin::with('items','categorties')->get();
      return $admins;
    }

    public function getAdmin(Admin $admin)
    {
      return $admin;
    }
}
