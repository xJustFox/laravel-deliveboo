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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 100);
            $table->string('slug');
            $table->text('description');
            $table->decimal('price', 8, 2)->default(0);
            $table->tinyInteger('visible')->default(0);
            $table->string('image', 255)->nullable();
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
};
