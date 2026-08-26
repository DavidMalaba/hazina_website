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
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->boolean('accepts_email')->default(true)->after('is_phone_also');
            $table->boolean('accepts_sms')->default(true)->after('accepts_email');
            $table->boolean('accepts_whatsapp')->default(true)->after('accepts_sms');
        });

        $tables = ['contact_messages', 'partner_requests', 'cohort_registrations'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'newsletter_opt_in')) {
                    $table->dropColumn('newsletter_opt_in');
                }
                $table->boolean('opt_in_email')->default(true);
                $table->boolean('opt_in_sms')->default(true);
                $table->boolean('opt_in_whatsapp')->default(true);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->dropColumn(['accepts_email', 'accepts_sms', 'accepts_whatsapp']);
        });

        $tables = ['contact_messages', 'partner_requests', 'cohort_registrations'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn(['opt_in_email', 'opt_in_sms', 'opt_in_whatsapp']);
                $table->boolean('newsletter_opt_in')->default(false);
            });
        }
    }
};
