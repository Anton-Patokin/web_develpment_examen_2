<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('item_id')->unsigned();

            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            $table->text('specification');

            $table->unique(['item_id','locale']);
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('item_translations');
    }
}
