<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations_users', function (Blueprint $table) {
            $table->unsignedBigInteger('organisation_id');
            $table->foreign('organisation_id')
                  ->on('organisations')
                  ->references('organisation_id')
                  ->onDelete('cascade');
            $table->bigInteger('user_id');
            $table->foreign('user_id')
                  ->on('users')
                  ->references('user_id')
                  ->onDelete('cascade');
            $table->tinyInteger('status_id');
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
        Schema::dropIfExists('organisations_users');
    }
}
