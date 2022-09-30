<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->uuid('task_uuid');
            $table->string('name');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                  ->on('projects')
                  ->references('project_id')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('parent_id');
            $table->tinyInteger('status_id');
            $table->bigInteger('last_activity_user_id');
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
        Schema::dropIfExists('tasks');
    }
}
