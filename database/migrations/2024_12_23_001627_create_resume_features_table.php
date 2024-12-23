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
        Schema::create('resume_features', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->dateTime('date');
            $table->longText('education')->nullable();
            $table->longText('gpa')->nullable();
            $table->longText('job')->nullable();
            $table->longText('years')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('skill')->nullable();
            $table->longText('soft_skill')->nullable();
            $table->longText('language')->nullable();
            $table->foreignId('analysis_id')->constrained('analyses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_features');
    }
};
