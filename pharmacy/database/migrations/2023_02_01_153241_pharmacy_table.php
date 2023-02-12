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
        Schema::create('pharmacy_table', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('pharmacy_name');
            $table->string('pharmacy_img');
            $table->string('pharmacy_address');
            $table->string('pharmacy_email');
            $table->string('pharmacy_phone');
            $table->string('pharmacy_location_link');



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
