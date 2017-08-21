@extends('v1.layouts.master')

@section('account')
   active
@endsection

@section('title')
   | Sign Up
@endsection

@section('css')

@endsection

@section('contain')
   <div class="container">
      <div class="row my-4">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            @if($errors->count() > 0)
               <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                     <li>{{$error}}</li>
                  @endforeach
               </div>
            @endif

            <form class="" action="/user/signup/request" method="post">
               {{ csrf_field() }}
               <h2 class="form-signin-heading">Sign Up</h2>

               <div class="form-group">
                  <label for="inputFirstName">First Name</label>
                  <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputLastName">Last Name</label>
                  <input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputMobile">Mobile</label>
                  <input type="text" id="inputMobile" name="mobile" class="form-control" placeholder="Mobile" value="{{old('mobile')}}" min="10" max="15" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputEmail">Email Address</label>
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputRePassword">Re-Password</label>
                  <input type="password" id="inputRePassword" name="re_password" class="form-control" placeholder="Re-Password" required="" autofocus="">
               </div>

               <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
            </form>
         </div>
         <div class="col-lg-3"></div>
      </div>
    </div>
@endsection
