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
        Schema::table('form_submits', function (Blueprint $table) {
            $table->decimal('avg_report_grade', 5, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('form_submits', function (Blueprint $table) {
            $table->decimal('avg_report_grade', 5, 2)->nullable(false)->change();
        });
    }
};
