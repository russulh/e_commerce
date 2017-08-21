<?php

namespace App\Http\Controllers\web\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class UserController extends Controller
{

    /**
     * [create for register user]
     * @param  Request $request [form data]
     * @return [object]           [Auth::user()]
     */
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(),[
         'first_name'   => 'required',
         'last_name'    => 'required',
         'mobile'       => 'required|min:10|max:15',
         'email'        => 'required|email|unique:users',
         'password'     => 'required|min:6',
         're_password'  => 'required|same:password'
      ]);

      if($validator->fails())
         return back()->withErrors($validator->errors())->withInput();

      $user = new User;
      $user->first_name =  $request->first_name;
      $user->last_name  =  $request->last_name;
      $user->mobile_no  =  $request->mobile;
      $user->email      =  $request->email;
      $user->password   =  bcrypt($request->password);

      if($user->save())
      {
         $cred =  $request->only('email','password');
         if(Auth::attempt($cred))
         {
            return redirect('/');
         }
         else{
            return "Not Auth";
         }
      }
      return abort(500);
    }

    /**
     * [signin for user can sign in]
     * @param  Request $request [form data]
     * if auth
     * @return [redirect]           [redirect to root]
     * else
     * @return [redirect]           [redirect to sign in form]
     */
    public function signin(Request $request)
    {
      $validator = Validator::make($request->all(),[
         'email'     => 'required|email|exists:users',
         'password'  => 'required'
      ]);

      if($validator->fails())
         return back()->withErrors($validator->errors())->withInput();

      $cred = $request->only('email','password');
      if(Auth::guard('web')->attempt($cred,true))
      {
         return redirect('/');
      }
      return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }

    /**
     * [logout user from system]
     * @return [redirect] [redirect to root]
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      //
      $validator = Validator::make($request->all(),[
         'first_name'   => 'required',
         'last_name'    => 'required',
         'mobile'       => 'required|min:10|max:15'
      ]);

      if($validator->fails())
         return back()->withErrors($validator->errors())->withInput();

      $user  =  Auth::user();
      $user->first_name =  $request->first_name;
      $user->last_name  =  $request->last_name;
      $user->mobile_no  =  $request->mobile;
      $user->save();
      return view('v1.pages.profile', compact('user'));
    }
}
