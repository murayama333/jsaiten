<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('feedbacks', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('presen_id');
             $table->integer('user_id');
             $table->text('comment');
             $table->datetime('datetime');
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('feedbacks');
     }
 }
