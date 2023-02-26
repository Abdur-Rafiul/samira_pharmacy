<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_details', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('medicine_name');

            $table->string('img1');
            $table->string('img2');
            $table->string('img3');

            $table->string('medicine_des');
            $table->string('pharmacy_name');



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
};
