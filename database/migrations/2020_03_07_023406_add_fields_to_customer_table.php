<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('mobile')->nullable();
            $table->datetime('dob')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state_province')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address_postal_code')->nullable();
            $table->integer('customer_vault_id')->nullable();
            $table->integer('billing_id')->nullable();
            $table->integer('shipping_id')->nullable();
            $table->integer('trasanction_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('company')->nullable();
            $table->integer('credit_card_number')->nullable();
            $table->integer('ccv')->nullable();
            $table->datetime('expiration_date')->nullable();
            $table->string('drivers_license_id')->nullable();
            $table->string('ssn')->nullable();
            $table->integer('fax_number')->nullable();
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('mobile');
            $table->dropColumn('dob');
            $table->dropColumn('address_street');
            $table->dropColumn('address_city');
            $table->dropColumn('address_state_province');
            $table->dropColumn('address_country');
            $table->dropColumn('address_postal_code');
            $table->dropColumn('customer_vault_id');
            $table->dropColumn('billing_id');
            $table->dropColumn('shipping_id');
            $table->dropColumn('trasanction_id');
            $table->dropColumn('account_number');
            $table->dropColumn('company');
            $table->dropColumn('credit_card_number');
            $table->dropColumn('ccv');
            $table->dropColumn('expiration_date');
            $table->dropColumn('drivers_license_id');
            $table->dropColumn('ssn');
            $table->dropColumn('fax_number');
            $table->dropColumn('website');
        });
    }
}
