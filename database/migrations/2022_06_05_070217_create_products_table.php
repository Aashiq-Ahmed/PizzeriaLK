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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->string('name'); // varchar 255

            $table->string('image')->nullable();

            $table->longText('description')->nullable(); // text

            $table->text('pizza_size')->nullable(); // text

            // $table->enum('pizza_size', ['Large', 'Small', 'Medium'])->nullable();

            $table->boolean('is_available')->default(true); // tinyint 2 - 0 or 1

            $table->float('price')->nullable(); // text

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
        Schema::dropIfExists('products');
    }
};
