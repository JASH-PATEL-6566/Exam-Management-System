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
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("exam_title");
            $table->dateTime("exam_datetime");
            $table->string("duration");
            $table->integer("total_question");
            $table->string("marks_per_right_answer");
            $table->string("marks_per_wrong_answer");
            $table->string("status");
            $table->string("exam_code");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam');
    }
};
