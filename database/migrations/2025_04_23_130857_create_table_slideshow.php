<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_slideshow', function (Blueprint $table) {
            $table->bigIncrements('ssid');
            $table->string('title');
            $table->string('img');
            $table->boolean('enable');
            $table->integer('ssorder');
            $table->timestamp('create_time')->nullable(); // OR $table->timestamps() for Laravel default
        });        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_slideshow');
    }
};
