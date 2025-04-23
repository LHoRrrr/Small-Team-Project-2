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
         Schema::create('product', function(Blueprint $table) {
            $table->bigIncrements('pid');
            $table->string('pname', 100);
            $table->string('pdesc', 300);
            $table->decimal('price', 8, 2);
            $table->boolean('enable');
            $table->integer('porder');
         }); 
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
