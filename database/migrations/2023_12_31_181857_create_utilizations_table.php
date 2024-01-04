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
            $table->string('bor');
            $table->string('btp');
            $table->string('yor');
            $table->string('ytp');
            $table->string('sor');
            $table->string('stp');
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