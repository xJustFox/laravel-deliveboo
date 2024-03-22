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
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dish');
            $table->unsignedBigInteger('id_order');
            $table->tinyInteger('quantity')->default(0);
            $table->timestamps();

            $table->foreign('id_dish')->references('id')->on('dishes');
            $table->foreign('id_order')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
};
