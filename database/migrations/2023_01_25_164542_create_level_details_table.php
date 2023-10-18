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
        Schema::create('level_details', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->tinyInteger('active')->default(1);
            $table->double('percent')->default(0);
            $table->integer('sort')->default(0);
            $table->foreignId('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreignId('question_type_id')->references('id')->on('question_types')->onDelete('cascade');
            $table->tinyInteger('is_file')->default(0);
            $table->tinyInteger('is_seen')->default(0);

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
        Schema::dropIfExists('level_details');
    }
};
