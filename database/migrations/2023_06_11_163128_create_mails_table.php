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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->morphs('sender');
            $table->morphs('receiver');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('file')->nullable();
            $table->tinyInteger('is_file')->default(0);
            $table->string('file_extension')->nullable();
            $table->enum('type',['text','image','file'])->default('text');
            $table->tinyInteger('sender_seen')->default(0);
            $table->tinyInteger('receiver_seen')->default(0);
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
        Schema::dropIfExists('mails');
    }
};
