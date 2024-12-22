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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_path');
            $table->float('education_rating');
            $table->float('gpa_rating');
            $table->float('job_rating');
            $table->float('years_rating');
            $table->float('experience_rating');
            $table->float('skill_rating');
            $table->float('soft_skill_rating');
            $table->float('language_rating');
            $table->foreignId('analysis_id')->constrained('analyses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
