<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayInfrastructurePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_infrastructure', function (Blueprint $table) {
            $table->unsignedBigInteger('infrastructure_id');
            $table->foreign('infrastructure_id', 'infrastructure_id_fk_3194077')->references('id')->on('infrastructures')->onDelete('cascade');
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id', 'day_id_fk_3194077')->references('id')->on('days')->onDelete('cascade');
            $table->string('from_hours');
            $table->string('from_minutes');
            $table->string('to_hours');
            $table->string('to_minutes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_infrastructure_pivot');
    }
}
