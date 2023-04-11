<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_admin',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',100);
            $table->string('username',100);
            $table->string('password',100);
        });
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
