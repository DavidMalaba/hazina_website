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
        Schema::table('newsletter_campaigns', function (Blueprint $table) {
            $table->string('whatsapp_image')->nullable()->after('whatsapp_content');
            $table->string('whatsapp_cta_text')->nullable()->after('whatsapp_image');
            $table->string('whatsapp_cta_url')->nullable()->after('whatsapp_cta_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletter_campaigns', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_image', 'whatsapp_cta_text', 'whatsapp_cta_url']);
        });
    }
};
