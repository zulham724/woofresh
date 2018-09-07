<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_values', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id'); 
            $table->integer('component_id')->unsigned();
            $table->string('unit');
            $table->string('value');
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_values');
    }
}
