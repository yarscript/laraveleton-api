<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->uuid('project_uuid');
            $table->string('name');
            $table->bigInteger('user_id');
            $table->uuid('user_uuid');
            $table->bigInteger('organisation_id');
            $table->uuid('organisation_uuid');
            $table->unsignedbigInteger('created_by')->nullable();
            $table->unsignedbigInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
