<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corp_name');
            $table->string('bank_name');
            $table->string('bank_site_listed');
            $table->string('phone_number');
            $table->decimal('total_mid_cap');
            $table->integer('total_sales_count');
            $table->decimal('total_sales', 8, 2);
            $table->integer('cancels');
            $table->integer('refunds');
            $table->integer('chargebacks');
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
        Schema::dropIfExists('merchants');
    }
}
