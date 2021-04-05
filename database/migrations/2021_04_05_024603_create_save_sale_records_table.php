<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveSaleRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_sale_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('sale_type');
            $table->string('customer_id');
            $table->string('customer_mobile');
            $table->string('total_amount');
            $table->string('discount');
            $table->string('payable_amount');
            $table->string('payment');
            $table->string('due');
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
        Schema::dropIfExists('save_sale_records');
    }
}
