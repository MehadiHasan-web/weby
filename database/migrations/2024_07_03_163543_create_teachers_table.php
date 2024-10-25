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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institute_id')->constrained('institutes')->onDelete('restrict');
            $table->string('name');
            $table->string('teacher_subject')->nullable();
            $table->string('degree')->nullable();
            $table->string('education_ins')->nullable();
            $table->string('phone')->nullable();
            $table->string('teacher_fee')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
