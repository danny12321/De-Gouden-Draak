<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0);
            $table->decimal('new_price', 6, 2);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('menuitem_id');

            $table->foreign('menuitem_id')->references('id')->on('menuitems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
