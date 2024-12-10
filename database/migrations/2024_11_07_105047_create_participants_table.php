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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_session_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('birthday');
            $table->string('age');
            $table->string('phone');
            $table->string('city');
            $table->string('prefecture')->nullable();
            $table->string('gender');
            $table->string('motivation');
            $table->string('source');
            $table->string('code');
            $table->string('image')->nullable();
            $table->string('current_step')->default('info_session');
            $table->boolean('is_visited')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
