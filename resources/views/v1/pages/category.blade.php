@extends('v1.layouts.master')


@section('title')
   | {{$category[0]->name}}
@endsection

@section('css')

@endsection

@section('contain')
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            @include('v1.layouts.sidebar_categories')
         </div>

         <div class="col-lg-9 my-4">
            <div class="row" id="root">
               <item v-for="item in items" :item="item"></item>
            </div>

            <div class="text-center">
               {{$category_paginate->links()}}
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
            items:{!!$category[0]->items!!}
         }
      });
   </script>
@endsection
