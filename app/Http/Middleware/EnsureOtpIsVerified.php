<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (!session('otp_verified') && !$request->is('admin/verify-otp') && !$request->is('livewire/*')) {
                return redirect()->route('otp.verify');
            }
        }
        
        return $next($request);
    }
}
