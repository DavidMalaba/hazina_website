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
        Schema::create('cohort_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cohort_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            
            // Motivation & Projet
            $table->text('motivation');
            $table->text('problem_solved')->nullable();
            $table->text('solution_description')->nullable();
            $table->text('project_description');
            $table->text('target_market')->nullable();
            $table->text('desired_partners')->nullable();

            $table->string('status')->default('pending'); // 'pending', 'accepted', 'rejected'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort_registrations');
    }
};
