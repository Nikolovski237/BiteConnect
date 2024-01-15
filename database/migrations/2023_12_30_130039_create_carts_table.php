<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id'); // Corrected column name
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('total_price')->default(1);
            $table->timestamps();

            $table->foreign('menu_item_id')->references('id')->on('menus')->onDelete('cascade'); // Corrected table name
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

