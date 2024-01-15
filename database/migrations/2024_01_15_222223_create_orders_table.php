<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('delivery_method');
            $table->string('delivery_time');
            $table->text('delivery_address');
            $table->boolean('no_contact_delivery');
            $table->text('selected_items');
            $table->string('full_name');
            $table->string('card_number');
            $table->string('expiration_date');
            $table->string('ccv');
            $table->decimal('tip_amount', 8, 2);
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
