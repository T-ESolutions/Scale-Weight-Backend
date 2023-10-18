<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_level_details', function (Blueprint $table) {
            $table->foreignId('emp_id')->nullable()->constrained('users')->restrictOnDelete();
            $table->tinyInteger('is_completed')->default(0);
            $table->tinyInteger('user_added')->default(0);
            $table->text('answer')->nullable();
            $table->string('answer_file')->nullable();
            $table->date('answer_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_level_details', function (Blueprint $table) {
            //
        });
    }
};
