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
        Schema::create('coworkings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('birthday');
            $table->text('formation');
            $table->string('cv')->nullable();
            $table->text('proj_name');
            $table->longText('proj_description');
            $table->longText('domain');
            $table->longText('plan');
            $table->string('presentation')->nullable();
            $table->longText('prev_proj')->nullable();
            $table->longText('reasons');
            $table->longText('needs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coworkings');
    }
};
