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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_genre');
            $table->unsignedBigInteger('id_restaurant');
            $table->string('name', 100);
            $table->text('description');
            $table->decimal('price', 8, 2)->default(0);
            $table->tinyInteger('visible')->default(0);
            $table->string('image', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_genre')->references('id')->on('genres');
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
        Schema::dropIfExists('foods');
    }
};
