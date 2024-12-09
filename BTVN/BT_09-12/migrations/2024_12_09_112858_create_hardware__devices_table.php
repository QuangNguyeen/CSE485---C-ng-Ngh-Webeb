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
        Schema::create('hardware__devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_name');
            $table->string('type');
            $table->boolean('status');
            $table->unsignedInteger('center_id');
            $table->foreign('center_id')->references('id')->on('it__centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware__devices');
    }
};
