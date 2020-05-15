<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuitems', function (Blueprint $table) {
            $table->id();
            $table->string('menunumber');
            $table->string('name');
            $table->decimal('price', 6, 2);
            $table->text('description');
            $table->boolean('specialty');
            $table->unsignedBigInteger('menuitem_type_id');

            $table->foreign('menuitem_type_id')->references('id')->on('menuitem_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuitems');
    }
}
