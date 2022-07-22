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

            $table->bigInteger('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('promotion_id')->unsigned()->nullable();

            $table->enum('status', ['pending', 'processing', 'delivered', 'cancelled']);

            $table->enum('payment_status', ['pending', 'paid', 'failed']);

            $table->enum('delivery_type', ['Collection', 'Delivery']);

            // Address
            $table->text('address')->nullable();
            $table->text('landmark')->nullable();

            $table->string('city')->nullable();

            $table->string('phone')->nullable();

            $table->float('discount', 10, 2)->nullable();

            $table->float('total', 10, 2)->nullable();

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
        Schema::dropIfExists('orders');
    }
};
