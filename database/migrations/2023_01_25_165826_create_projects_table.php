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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('status_id')->references('id')->on('statuses')->onDelete('restrict');
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('restrict');
            $table->foreignId('contract_id')->nullable()->references('id')->on('contracts')->onDelete('restrict');
            $table->enum('type',['project','contract'])->default('project');
            $table->enum('active_project',['pending','active','inactive'])->default('pending');

            $table->date('accept_date')->nullable();
            $table->date('confirm_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('archived_date')->nullable();

           //for location
            $table->enum('address_type',['url','map'])->default('map')->nullable();
            $table->text('address_url')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

            $table->double('progress')->default(0);
            $table->double('total_price')->default(0);
            $table->tinyInteger('is_plan')->default(0);
            $table->tinyInteger('is_archived')->default(0);
            $table->tinyInteger('is_seen')->default(0);
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('projects');
    }
};
