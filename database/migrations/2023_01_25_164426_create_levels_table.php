<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->string('name_ar');
            $table->string('name_en');
            $table->double('percent')->default(0);
            $table->integer('expected_days')->default(0);
            $table->foreignId('type_id')->references('id')->on('level_types')->onDelete('restrict');
            $table->tinyInteger('active')->default(1);
            $table->integer('sort')->default(0);

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
        Schema::dropIfExists('levels');
    }
};
