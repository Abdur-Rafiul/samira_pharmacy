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
        Schema::create('order_medicine_table', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->string('medicine_name');
            $table->string('medicine_img');
            $table->string('medicine_price');
            $table->string('medicine_special_price');
            $table->string('medicine_discount');
            $table->string('email');
            $table->string('delivery_email');
            $table->string('phone');
            $table->string('fname');
            $table->string('pharmacy');
            $table->string('address');
            $table->string('status');


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
