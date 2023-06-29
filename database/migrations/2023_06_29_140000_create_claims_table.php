<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id');

            $table->index('student_id', 'claim_student_idx');
            $table->index('teacher_id', 'claim_teacher_idx');

            $table->foreign('student_id', 'claim_student_fk')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id', 'claim_teacher_fk')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->text('comment')->nullable();

            $table->text('claim_file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
