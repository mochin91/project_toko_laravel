<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details__orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('Product_slug');
            $table->integer('qty');
            $table->decimal('price',10,0);
            $table->decimal('total',10,0);
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
        Schema::dropIfExists('details__orders');
    }
}
