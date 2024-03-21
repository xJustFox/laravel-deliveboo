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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_restaurant');
            $table->string('name', 100);
            $table->string('slug');
            $table->string('email', 150)->unique();
            $table->string('delivery_address', 255);
            $table->string('phone_num', 255);
            $table->decimal('price', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('id_restaurant')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
