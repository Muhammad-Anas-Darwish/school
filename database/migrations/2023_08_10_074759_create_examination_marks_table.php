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
        Schema::create('examination_marks', function (Blueprint $table) {
            $table->id();
            $table->integer('mark');
            $table->foreignId('student_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('grade_id')->constrained(table: 'grades');
            $table->foreignId('year_id')->constrained();
            $table->foreignId('exam_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->boolean('been_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examination_marks');
    }
};
