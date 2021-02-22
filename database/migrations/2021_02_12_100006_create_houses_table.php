<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('price', 15, 2);
            $table->string('price_status')->nullable()->default('0');
            $table->string('currency')->nullable()->default(0);
            $table->string('payment_time')->nullable()->default(1);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('floors')->nullable()->default(1);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('description');
            $table->string('house_status')->nullable()->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by', 'created_by_fk_2988081')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_310765')->references('id')->on('categories');
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
        Schema::dropIfExists('houses');
    }
}
