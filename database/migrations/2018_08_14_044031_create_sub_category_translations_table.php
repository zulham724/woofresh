<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_translations', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category_translations');
    }
}
