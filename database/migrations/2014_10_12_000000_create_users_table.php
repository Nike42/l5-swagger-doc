<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('users', function (Blueprint $table) {
          //  $table->id();
            //$table->string('name');
            //$table->string('email');
          //  $table->timestamp('email_verified_at')->nullable();
        //    $table->string('password');
          //  $table->rememberToken();
            //$table->timestamps();
       // }); 
        //  Schema::defaultStringLength(191);
       Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    
        $table->index([DB::raw('email(191)')]);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
