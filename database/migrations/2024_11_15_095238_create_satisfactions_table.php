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
        Schema::create('satisfactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();
            $table->boolean('interest_in_joining_lionsgeek')->default(0);
            $table->boolean('studying')->default(0);
            $table->boolean('working')->default(0);
            $table->boolean('overall_availability')->default(0);
            $table->boolean('ability_to_learn')->default(0);
            $table->boolean('language')->default(0);
            $table->boolean('discipline')->default(0);
            $table->boolean('motivation_overcoming_challenges')->default(0);
            $table->boolean('team_player')->default(0);
            $table->boolean('soft_skills')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satisfactions');
    }
};
