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
            $table->dropColumn(['subject', 'content']);
            
            $table->string('name')->after('id');
            $table->boolean('send_email')->default(true)->after('name');
            $table->string('email_subject')->nullable()->after('send_email');
            $table->longText('email_content')->nullable()->after('email_subject');
            
            $table->boolean('send_whatsapp')->default(false)->after('email_content');
            $table->text('whatsapp_content')->nullable()->after('send_whatsapp');
            
            $table->boolean('send_sms')->default(false)->after('whatsapp_content');
            $table->text('sms_content')->nullable()->after('send_sms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletter_campaigns', function (Blueprint $table) {
            $table->string('subject')->after('id');
            $table->longText('content')->after('subject');
            
            $table->dropColumn([
                'name',
                'send_email',
                'email_subject',
                'email_content',
                'send_whatsapp',
                'whatsapp_content',
                'send_sms',
                'sms_content'
            ]);
        });
    }
};
