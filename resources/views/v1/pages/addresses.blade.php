@extends('v1.layouts.master')


@section('title')
   | {{$user[0]->first_name}}s' Addresses
@endsection

@section('account')
   active
@endsection

@section('addresses')
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
            <div class="row" id="root">
               <useraddress v-for="address in addresses" :address="address"></useraddress>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('js')
   <script src="https://unpkg.com/vue@2.4.2"></script>
   <script src="/js/vue.js"></script>
   <script>
      var app = new Vue({
         el: "#root",
         data:{
            addresses:{!!$user[0]->addresses!!}
         }
      });
   </script>
@endsection
