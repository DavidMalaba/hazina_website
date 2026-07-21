<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cohort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicLinkController extends Controller
{
    public function login(Request $request, User $user, Cohort $cohort)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Ce lien est invalide ou a expiré.');
        }

        Auth::login($user);

        return redirect()->route('cohorts.register', $cohort->slug)
            ->with('success', 'Bienvenue ! Vous pouvez reprendre votre inscription.');
    }
}
