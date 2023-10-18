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
        Schema::create('project_level_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->references('id')->on('project_levels')->onDelete('cascade');
            $table->string('name_ar');
            $table->string('name_en');
            $table->tinyInteger('active')->default(1);
            $table->double('percent');
            $table->tinyInteger('is_file')->default(0);

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
        Schema::dropIfExists('project_level_details');
    }
};
