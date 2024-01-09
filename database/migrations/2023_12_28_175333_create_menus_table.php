<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['Burger', 'Pizza', 'Pasta', 'Salad', 'Soup', 'Sandwich', 'Wraps', 'Desert', 'Fish', 'BBQ']);
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
