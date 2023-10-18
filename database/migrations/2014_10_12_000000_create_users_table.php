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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->integer('active')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['admin','employee'])->default('employee');
            $table->foreignId('job_type_id')->nullable()->references('id')->on('job_types')->onDelete('restrict');
            $table->foreignId('state_id')->nullable()->references('id')->on('states')->onDelete('restrict');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
