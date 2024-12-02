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
            $table->string('education_target');
            $table->string('gpa_target');
            $table->string('job_target');
            $table->string('years_target');
            $table->string('experience_target');
            $table->string('skill_target');
            $table->string('soft_skill_target');
            $table->string('language_target');
            $table->unsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('cvs');
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
