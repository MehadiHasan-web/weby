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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institute_id')->constrained('institutes')->onDelete('cascade');
            $table->bigInteger('batche_id')->constrained('batches')->onDelete('cascade');
            $table->string('name');
            $table->string('exam_invigilator')->nullable();
            $table->string('course_teacher')->nullable();
            $table->string('exam_topic')->nullable();
            $table->string('exam_date')->nullable();
            $table->string('total_time')->nullable();
            $table->string('exam_marks')->nullable();
            $table->text('exam_paper')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
