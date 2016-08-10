<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRecentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',10);
            $table->char('first_name',50);
            $table->char('last_name',50);
            $table->string('email');
            $table->text('address')->nullable();
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
        Schema::drop('recent_users');
    }
}
