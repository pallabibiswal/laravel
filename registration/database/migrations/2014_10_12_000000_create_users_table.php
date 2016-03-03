<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration; 

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first',30);
            $table->string('last',30);
            $table->string('middle',30);
            $table->string('suffix',30);
            $table->string('employement',15);
            $table->string('employer',30);
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('gender',7);
            $table->string('status',10);
            $table->string('rstreet',30);
            $table->string('rcity',30);
            $table->string('rstate',30);
            $table->string('rphone',10);
            $table->string('ostreet',30);
            $table->string('ocity',30);
            $table->string('ostate',30);
            $table->string('ophone',10);
            $table->string('photo',100);
            $table->string('tweet',30);
            $table->string('extra');
            $table->string('password', 60);
            $table->string('repassword', 30);
            $table->string('activate',4);
            $table->integer('role_id')->unsigned();;
            $table->string('key',60);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
