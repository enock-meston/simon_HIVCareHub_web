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
        Schema::create('result_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientId')->constrained('patients')->onDelete('cascade');
            $table->foreignId('addedBy')->constrained('users')->onDelete('cascade');
            $table->enum('result',['Normal','Unfavorable']);
            $table->string('referenceRange');
            $table->string('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_models');
    }
};
