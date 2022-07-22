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

        Schema::create('toppings', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->string('name')->nullable(); // varchar 255

            $table->longText('topping')->nullable(); // text

            $table->float('price')->nullable(); // text

            $table->boolean('is_available')->default(true); // tinyint 2 - 0 or 1

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
        Schema::dropIfExists('toppings');
    }
};
