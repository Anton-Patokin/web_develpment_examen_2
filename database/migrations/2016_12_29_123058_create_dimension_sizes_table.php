<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimensionSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimension_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('height');
            $table->integer('width');
            $table->integer('item_dimension_id')->unsigned();
            $table->foreign('item_dimension_id')->references('id')->on('item_dimensions')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('dimension_sizes');
    }
}
