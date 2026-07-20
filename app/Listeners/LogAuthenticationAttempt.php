<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Http;
use App\Models\AuthenticationLog;
use Jenssegers\Agent\Agent;

class LogAuthenticationAttempt
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Not used, we use subscribe
    }

    public function handleLogin(Login $event)
    {
        $this->logAttempt($event->user->id, $event->user->email, 'successful');
    }

    public function handleFailed(Failed $event)
    {
        $email = $event->credentials['email'] ?? null;
        $user = $event->user;
        $this->logAttempt($user?->id, $email, 'failed');
    }

    protected function logAttempt($userId, $email, $status)
    {
        $request = request();
        $ip = $request->ip();
        
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        $city = null;
        $country = null;

        if ($ip && $ip !== '127.0.0.1' && $ip !== '::1') {
            try {
                $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");
                if ($response->successful() && $response->json('status') === 'success') {
                    $city = $response->json('city');
                    $country = $response->json('country');
                }
            } catch (\Exception $e) {
                // Ignore API failures to not break login
            }
        } else {
            $city = 'Local';
            $country = 'Local';
        }

        AuthenticationLog::create([
            'user_id' => $userId,
            'email' => $email,
            'ip_address' => $ip,
            'user_agent' => $request->userAgent(),
            'browser' => $agent->browser() . ' ' . $agent->version($agent->browser()),
            'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()),
            'device' => $agent->device(),
            'city' => $city,
            'country' => $country,
            'status' => $status,
        ]);
    }

    public function subscribe($events)
    {
        return [
            Login::class => 'handleLogin',
            Failed::class => 'handleFailed',
        ];
    }
}
