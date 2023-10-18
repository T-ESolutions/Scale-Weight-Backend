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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->references('id')->on('project_levels')->onDelete('cascade');
            $table->string('message');
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
        Schema::dropIfExists('messages');
    }
};
