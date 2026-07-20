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
        Schema::create('partner_requests', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('org_type');
            $table->string('website')->nullable();
            $table->string('contact_name');
            $table->string('contact_role');
            $table->string('email');
            $table->string('phone');
            $table->json('interests');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_requests');
    }
};
