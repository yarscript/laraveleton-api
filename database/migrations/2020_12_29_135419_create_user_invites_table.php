<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invites', function (Blueprint $table) {
            $table->bigIncrements('user_invite_id')->unique();
            $table->uuid('user_invite_uuid');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('organisation_id')->nullable();
            $table->uuid('organisation_uuid');
//            $table->bigInteger('company');
//            $table->bigInteger('project_id')->nullable();
//            $table->uuid('project_uuid')->nullable();
            $table->bigInteger('invited_by_id');
            $table->uuid('invited_by_uuid');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_invites');
    }
}
