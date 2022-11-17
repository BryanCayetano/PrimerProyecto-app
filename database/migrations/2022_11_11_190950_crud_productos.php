<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crud_productos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("price");
            $table->string("description");
            $table->integer("stock")->default(0);
            $table->unsignedBigInteger('category_id');
            
            $table->foreign('category_id')->references('id_category')->on('crud_category');
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
        Schema::dropIfExists('crud_productos');
    }
};
