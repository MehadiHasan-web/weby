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
        Schema::create('teacher_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->constrained('teachers')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('institute_id')->constrained('institutes')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('paid')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_payments');
    }
};
