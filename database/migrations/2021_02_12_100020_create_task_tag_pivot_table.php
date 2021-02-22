<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_2989099')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('task_tag_id');
            $table->foreign('task_tag_id', 'task_tag_id_fk_2989099')->references('id')->on('task_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_tag');
    }
}
