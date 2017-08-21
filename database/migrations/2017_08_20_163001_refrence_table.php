<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefrenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('categories')) {
         Schema::table('categories', function (Blueprint $table) {
            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onUpdate('Cascade')
                  ->onDelete('No Action');
         });
      }

      if (Schema::hasTable('items')) {
         Schema::table('items', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onUpdate('Cascade')
                  ->onDelete('Cascade');

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onUpdate('Cascade');
         });
      }

      if (Schema::hasTable('ads')) {
         Schema::table('ads', function (Blueprint $table) {
            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onUpdate('Cascade');
         });
      }

      if (Schema::hasTable('item_images')) {
         Schema::table('item_images', function (Blueprint $table) {
            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onUpdate('Cascade');

            $table->foreign('item_id')
                  ->references('id')
                  ->on('items')
                  ->onUpdate('Cascade')
                  ->onDelete('Cascade');
         });
      }

      if (Schema::hasTable('user_addresses')) {
         Schema::table('user_addresses', function (Blueprint $table) {

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('Cascade')
                  ->onDelete('Cascade');
         });
      }

      if (Schema::hasTable('orders')) {
         Schema::table('orders', function (Blueprint $table) {

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('Cascade');

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins')
                  ->onUpdate('Cascade');

            $table->foreign('user_address_id')
                  ->references('id')
                  ->on('user_addresses')
                  ->onUpdate('Cascade');
         });
      }

      if (Schema::hasTable('item_order')) {
         Schema::table('item_order', function (Blueprint $table) {
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onUpdate('Cascade')
                  ->onDelete('Cascade');

            $table->foreign('item_id')
                  ->references('id')
                  ->on('items')
                  ->onUpdate('Cascade');
         });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
