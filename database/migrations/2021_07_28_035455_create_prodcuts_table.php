<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdcutsTable extends Migration
{

    public function up()
    {
        Schema::create('prodcuts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Product_name', 999);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prodcuts');
    }
}
