<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Invoice');
            $table->string('invoice_number', 50);
            $table->foreign('id_Invoice')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('Section', 999);
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
