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
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('personal_info_id');
            $table->unsignedBigInteger('parent_info_id');
            $table->unsignedBigInteger('education_id');
            $table->unsignedBigInteger('major_selection_id');
            $table->unsignedBigInteger('documents_id');
            $table->unsignedBigInteger('additional_id');
            $table->unsignedBigInteger('statement_agreement_id');
            $table->timestamp('submission_date');
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('personal_info_id')->references('id')->on('personal_informations')->onDelete('cascade');
            $table->foreign('parent_info_id')->references('id')->on('parent_informations')->onDelete('cascade');
            $table->foreign('education_id')->references('id')->on('previous_educations')->onDelete('cascade');
            $table->foreign('major_selection_id')->references('id')->on('major_selections')->onDelete('cascade');
            $table->foreign('documents_id')->references('id')->on('supporting_documents')->onDelete('cascade');
            $table->foreign('additional_id')->references('id')->on('additional_informations')->onDelete('cascade');
            $table->foreign('statement_agreement_id')->references('id')->on('statements_and_agreements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
