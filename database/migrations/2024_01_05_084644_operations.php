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
        Schema::create('operations', function (Blueprint $table) {
            $table->unsignedBigInteger('traffic_id')->nullable();
            $table->unsignedBigInteger('services_id')->nullable();
            $table->unsignedBigInteger('utilizations_id')->nullable();
            $table->unsignedBigInteger('productivities_id')->nullable();
            $table->foreign('traffic_id')->references('id')->on('traffic')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('utilizations_id')->references('id')->on('utilizations')->onDelete('cascade');
            $table->foreign('productivities_id')->references('id')->on('productivities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};