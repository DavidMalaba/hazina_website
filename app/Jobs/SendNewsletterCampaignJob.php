<?php

namespace App\Jobs;

use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscriber;
use App\Mail\NewsletterCampaignMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsletterCampaignJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $campaign;

    /**
     * Create a new job instance.
     */
    public function __construct(NewsletterCampaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get all active subscribers
        $subscribers = NewsletterSubscriber::where('status', \App\Enums\SubscriberStatus::Active)->get();

        foreach ($subscribers as $subscriber) {
            if ($subscriber->accepts_email && $this->campaign->send_email && $this->campaign->email_subject && $this->campaign->email_content) {
                Mail::to($subscriber->email)->send(new NewsletterCampaignMail($this->campaign, $subscriber));
            }
            
            // Placeholder for WhatsApp integration
            if ($subscriber->accepts_whatsapp && $this->campaign->send_whatsapp && $this->campaign->whatsapp_content) {
                // TODO: Send WhatsApp
            }

            // Placeholder for SMS integration
            if ($subscriber->accepts_sms && $this->campaign->send_sms && $this->campaign->sms_content) {
                // TODO: Send SMS
            }
        }
    }
}
