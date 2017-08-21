@extends('v1.layouts.master')


@section('title')
   | {{$user->first_name}}
@endsection

@section('account')
   active
@endsection

@section('profile')
   active
@endsection

@section('css')

@endsection

@section('contain')
   <div class="container">
      <div class="row">

         <div class="col-lg-3 my-4">
            @include('v1.layouts.sidebar_user')
         </div>

         <div class="col-lg-9 my-4">
            @if($errors->count() > 0)
               <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                     <li>{{$error}}</li>
                  @endforeach
               </div>
            @endif

            <form class="" action="/user/profile/update" method="post">
               {{ csrf_field() }}
               <h2 class="form-signin-heading">Update Profile</h2>

               <div class="form-group">
                  <label for="inputFirstName">First Name</label>
                  <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" value="{{$user->first_name}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputLastName">Last Name</label>
                  <input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputMobile">Mobile</label>
                  <input type="text" id="inputMobile" name="mobile" class="form-control" placeholder="Mobile" value="{{$user->mobile_no}}" min="10" max="15" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputEmail">Email Address</label>
                  <span>{{$user->email}}</span>
               </div>

               <button class="btn btn-primary btn-block" type="submit">Save</button>
            </form>
         </div>
      </div>
   </div>
@endsection

@section('js')

@endsection
