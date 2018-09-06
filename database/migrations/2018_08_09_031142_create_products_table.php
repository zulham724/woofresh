<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('group_id')->unsigned();
<<<<<<< HEAD
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->string('name');
            $table->string('description');
=======
            // $table->integer('category_id')->unsigned();
            $table->integer('sud_category_id')->unsigned();
>>>>>>> af2433634e95bd1455c08e916f2909a242fbe7bf
            $table->integer('quantity')->default(0);
            $table->bigInteger('price')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('unit')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('is_available')->default(1);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
