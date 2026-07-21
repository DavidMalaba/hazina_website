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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
        });

        Schema::table('cohort_registrations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('current_step')->default('informations_personnelles')->after('status');
            
            // Make existing fields nullable
            $table->foreignId('company_id')->nullable()->change();
            $table->text('motivation')->nullable()->change();
            $table->text('project_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cohort_registrations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'current_step']);
            
            // Reverting nullable changes might fail if there's null data, but this is the standard way
            $table->foreignId('company_id')->nullable(false)->change();
            $table->text('motivation')->nullable(false)->change();
            $table->text('project_description')->nullable(false)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['city_id']);
            $table->dropColumn(['province_id', 'city_id']);
        });
    }
};
