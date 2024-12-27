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
        Schema::create('info_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('formation', ['Coding', 'Media']);
            $table->dateTime('start_date');
            $table->integer('places');
            $table->boolean('isAvailable')->default(false);
            $table->boolean('isFinish')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_sessions');
    }
};
