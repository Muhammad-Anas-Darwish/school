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
        Schema::create('marks_year', function (Blueprint $table) {
            $table->id();
            $table->integer('mark');
            $table->enum('type', ['homeworks', 'recite', 'participation', 'discipline']);
            $table->boolean('been_read')->default(false);
            $table->foreignId('student_id')->constrained(table: 'students');
            $table->foreignId('subject_id')->constrained(table: 'subjects');
            $table->foreignId('grade_id')->constrained(table: 'grades');
            $table->foreignId('year_id')->constrained(table: 'years');
            $table->foreignId('semester_id')->constrained(table: 'semesters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks_year');
    }
};
