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
        Schema::create('utilizations', function (Blueprint $table) {
            $table->id();
            $table->string('bor')->nullable();
            $table->string('btp')->nullable();
            $table->string('yor')->nullable();
            $table->string('ytp')->nullable();
            $table->string('sor')->nullable();
            $table->string('stp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizations');
    }
};