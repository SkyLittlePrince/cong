<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table){
	        $table->increments('id');
	        $table->string('username', 20)->unique();
	        $table->string('email', 100)->unique();
	        $table->string('password', 256);
	        $table->string('mobile', 100)->unique();
	        $table->string('gender', 100);
	        $table->integer('role_id')->unsigned();
	        $table->string('remember_token', 256)->default('default');
	        $table->timestamps();
        });

        //Schema::table('users', function($table){
        //	$table->engine = 'InnoDB';
        //    $table->foreign('role_id')->references('id')->on('roles');
        //});
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
