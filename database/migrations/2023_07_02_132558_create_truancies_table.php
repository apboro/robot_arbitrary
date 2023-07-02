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
        Schema::create('truancies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('couple');
            $table->integer('count_hours');

            $table->index('teacher_id', 'truancy_teacher_idx');
            $table->index('group_id', 'truancy_group_idx');
            $table->index('student_id', 'truancy_student_idx');
            $table->index('item_id', 'truancy_item_idx');

            $table->foreign('teacher_id', 'truancy_teacher_fk')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id', 'truancy_group_fk')->on('groups')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id', 'truancy_student_fk')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id', 'truancy_item_fk')->on('items')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truancies');
    }
};
