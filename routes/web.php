<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['prefix'=>'/'],function (){
//    Route::get('admins','AdminController@getAdmins');
//
//    Route::group(['prefix'=>'admin/'],function(){
//       Route::get('{admin}','AdminController@getAdmin');
//    });
//
//
// });

/**
 * notes:
 *    1- any view i used PageController
 */
Route::group(['prefix'=>'/','namespace'=>'\web\v1'],function (){
   // here the pages that appear to all
   Route::get('','PageController@index');

   // this route for user
   Route::group(['prefix'=>'user/'],function(){
      Route::group(['middleware'=>'guest'],function(){
         // register
         Route::get('signup','PageController@signup');
         Route::post('signup/request','UserController@create');

         // login
         Route::get('signin','PageController@signin');
         Route::post('signin/request','UserController@signin');
      });

      // user can access to..
      Route::group(['middleware'=>'auth.user'],function(){
         // logout
         Route::get('logout','UserController@logout');

         // view and edit profiel
         Route::get('profile','PageController@profile');
         Route::post('profile/update','UserController@update');

         // view and edit address
         Route::get('addresses','PageController@addresses');
         Route::get('address/update/{id}','PageController@address');
         Route::post('address/update/request/','UserAddressController@update_address');
         Route::get('address/delete/{useraddress}','UserAddressController@delete_address');
      });
   });

   // this route for category
   Route::group(['prefix'=>'category/'],function(){
      Route::get('{id}','PageController@category');
   });
});

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
