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
        Schema::create('form_submits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // personal info
            $table->string('full_name');
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('nisn');
            $table->string('religion');
            $table->text('address');
            $table->string('phone_number');
            $table->string('email')->nullable();

            // parent info
            $table->string('father_name');
            $table->string('father_job');
            $table->string('mother_name');
            $table->string('mother_job');
            $table->string('parent_phone');
            $table->string('parent_address');

            //previous_education
            $table->string('previous_school');
            $table->text('school_address');
            $table->year('graduation_year');
            $table->decimal('avg_report_grade', 5, 2);
            $table->decimal('final_exam_grade', 5, 2)->nullable();

            // major_selection
            $table->string('first_major');
            $table->string('second_major');

            // supporting_document
            $table->string('birth_certificate')->nullable();
            $table->string('family_card')->nullable();
            $table->string('diploma_or_skl')->nullable();
            $table->string('photo')->nullable();
            $table->string('health_certificate')->nullable();

            // additional_information
            $table->text('achievements')->nullable();
            $table->text('reason_major')->nullable();

            // statements_and_agreement
            $table->boolean('statement');
            $table->boolean('agreement');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submits');
    }
};
