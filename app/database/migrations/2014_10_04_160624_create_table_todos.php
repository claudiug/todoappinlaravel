<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTodos extends Migration {

	public function up()
    {
        Schema::create('totos', function($table){
            $table->increments('id');
            $table->string('title');
            $table->boolean('status');
            $table->timestamps();
        });
	}


	public function down()
	{
		Schema::drop('todos');
	}

}
