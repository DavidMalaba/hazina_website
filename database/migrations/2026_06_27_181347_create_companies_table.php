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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('industry_sector')->nullable();
            $table->string('business_age_range')->nullable();
            $table->string('employee_count')->nullable();
            $table->string('revenue_range')->nullable();
            $table->string('client_count_range')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
