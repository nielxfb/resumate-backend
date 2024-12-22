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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->dateTime('date');
            $table->longText('education_target')->nullable();
            $table->longText('gpa_target')->nullable();
            $table->longText('job_target')->nullable();
            $table->longText('years_target')->nullable();
            $table->longText('experience_target')->nullable();
            $table->longText('skill_target')->nullable();
            $table->longText('soft_skill_target')->nullable();
            $table->longText('language_target')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
