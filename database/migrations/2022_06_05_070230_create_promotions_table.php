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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('size_id')->unsigned()->nullable();

            $table->string('name'); // varchar 255

            $table->string('code'); // varchar 255

            $table->enum('type', ['number_of_items_validation', 'total_amount_validation']);

            $table->integer('value')->nullable();

            $table->enum('price_type', ['fixed', 'percentage']);

            $table->float('price_value', 10, 2)->nullable();

            $table->longText('description')->nullable(); // text

            $table->longText('delivery_method')->nullable(); // text

            $table->boolean('is_active')->default(true); // tinyint 2 - 0 or 1

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
