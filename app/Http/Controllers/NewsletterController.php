<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function showUnsubscribe(Request $request, NewsletterSubscriber $subscriber)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Ce lien de désabonnement est invalide ou a expiré.');
        }

        // Si déjà désabonné, afficher directement la page de succès
        if ($subscriber->status === \App\Enums\SubscriberStatus::Unsubscribed->value || $subscriber->status === \App\Enums\SubscriberStatus::Unsubscribed) {
            return view('newsletter.unsubscribed');
        }

        return view('newsletter.unsubscribe-form', compact('subscriber'));
    }

    public function processUnsubscribe(Request $request, NewsletterSubscriber $subscriber)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Ce lien de désabonnement est invalide ou a expiré.');
        }

        if ($request->has('unsubscribe_all')) {
            $request->validate([
                'reason' => 'required|string',
                'other_reason' => 'nullable|string|max:150',
            ]);
            $finalReason = $request->reason === 'other' ? $request->other_reason : $request->reason;
            
            $subscriber->update([
                'status' => \App\Enums\SubscriberStatus::Unsubscribed,
                'unsubscription_reason' => $finalReason,
                'accepts_email' => false,
                'accepts_whatsapp' => false,
                'accepts_sms' => false,
            ]);
            return view('newsletter.unsubscribed');
        }

        $channels = $request->input('channels', []);
        $acceptsEmail = isset($channels['email']);
        $acceptsWhatsapp = isset($channels['whatsapp']);
        $acceptsSms = isset($channels['sms']);

        if (!$acceptsEmail && !$acceptsWhatsapp && !$acceptsSms) {
            $subscriber->update([
                'status' => \App\Enums\SubscriberStatus::Unsubscribed,
                'accepts_email' => false,
                'accepts_whatsapp' => false,
                'accepts_sms' => false,
            ]);
            return view('newsletter.unsubscribed');
        }

        $subscriber->update([
            'status' => \App\Enums\SubscriberStatus::Active,
            'accepts_email' => $acceptsEmail,
            'accepts_whatsapp' => $acceptsWhatsapp,
            'accepts_sms' => $acceptsSms,
        ]);

        return back()->with('success', 'Vos préférences ont été mises à jour avec succès.');
    }
}
