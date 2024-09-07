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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_levels_id')->nullable();
            $table->foreign('test_levels_id')->references('id')->on('test_levels');
            $table->unsignedBigInteger('test_courses_id')->nullable();
            $table->foreign('test_courses_id')->references('id')->on('test_courses');
            $table->text('question');
            $table->json('options');
            $table->string('answer');
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
