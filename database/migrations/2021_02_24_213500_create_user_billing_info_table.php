<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBillingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_billing_info', function (Blueprint $table) {
            $table->id('billing_info_id');
            $table->uuid('billing_info_uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('data')->nullable();
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->integer('credit_card')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
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
        Schema::dropIfExists('user_billing_info');
    }
}
