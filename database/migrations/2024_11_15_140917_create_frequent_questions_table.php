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
        Schema::create('frequent_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();
            $table->string('mode_of_transportation')->nullable()->default('');
            $table->string('living_situation')->nullable()->default('');
            $table->string('where_have_you_heard_of_lionsgeek')->nullable()->default('');
            $table->string('academic_background')->nullable()->default('');
            $table->string('professional_experience')->nullable()->default('');
            $table->string('interest_in_joining_lionsgeek')->nullable()->default('');
            $table->string('technical_skills')->nullable()->default('');
            $table->string('profeciency_in_french')->nullable()->default('');
            $table->string('profeciency_in_english')->nullable()->default('');
            $table->string('strengths')->nullable()->default('');
            $table->string('weaknesses')->nullable()->default('');
            $table->string('do_you_have_a_laptop')->nullable()->default('');
            $table->string('available_all_week')->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequent_questions');
    }
};
