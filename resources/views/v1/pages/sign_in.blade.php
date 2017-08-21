@extends('v1.layouts.master')

@section('account')
   active
@endsection

@section('title')
   | Sign In
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

            <form class="" action="/user/signin/request" method="post">
               {{ csrf_field() }}
               <h2 class="form-signin-heading">Please sign In</h2>
               <div class="form-group">
                  <label for="inputEmail">Email address</label>
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="{{old('email')}}" required="" autofocus="">
               </div>

               <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
               </div>

               <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </form>
         </div>
         <div class="col-lg-3"></div>
      </div>
    </div>
@endsection
