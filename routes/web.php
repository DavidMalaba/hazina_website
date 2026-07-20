<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Programs;
use App\Livewire\Contact;
use App\Livewire\Partners;
use App\Livewire\Blog\Index;
use App\Livewire\Blog\Show;
use App\Livewire\Auth\VerifyOtp;
use App\Livewire\Auth\SetupPassword;

Route::get('/', App\Livewire\Home::class)->name('home');
Route::get('/about', App\Livewire\About::class)->name('about');
Route::get('/preview-email-1', function () {
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->make(['first_name' => 'Jean', 'last_name' => 'Dupont', 'email' => 'jean@example.com', 'phone' => '+243999999999']);
    $company = \App\Models\Company::with(['province', 'city'])->first() ?? new \App\Models\Company(['name' => 'Hazina Startup', 'industry_sector' => 'Technologie']);
    $cohort = \App\Models\Cohort::first() ?? new \App\Models\Cohort(['name' => 'Cohorte Alpha 2026']);
    $registration = \App\Models\CohortRegistration::first() ?? new \App\Models\CohortRegistration(['problem_solved' => 'Le manque de traçabilité dans le secteur.', 'target_market' => 'Les coopératives minières artisanales.']);

    return new \App\Mail\RegistrationConfirmed($user, $company, $registration, $cohort);
});

Route::get('/preview-email-setup', function () {
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->make(['first_name' => 'Jean']);
    return new \App\Mail\SetupAccountMail($user, url('/setup-password/ABC123XYZ'), '458921');
});

Route::get('/preview-email-2fa', function () {
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->make(['first_name' => 'Jean']);
    return new \App\Mail\TwoFactorCodeMail($user, '829104', '192.168.1.45', 'Chrome 114 sur Windows', 'Kinshasa, RDC');
});
Route::get('/mission-vision', App\Livewire\MissionVision::class)->name('mission-vision');
Route::get('/solutions', App\Livewire\Solutions::class)->name('solutions');
Route::get('/cohorts', App\Livewire\Cohorts\Index::class)->name('cohorts.index');
Route::get('/cohorts/{cohort:slug}', App\Livewire\Cohorts\Show::class)->name('cohorts.show');
Route::get('/programs', App\Livewire\Programs::class)->name('programs');
Route::get('/partners', App\Livewire\Partners::class)->name('partners');
Route::get('/become-partner', App\Livewire\BecomePartner::class)->name('become-partner');
Route::get('/blog', App\Livewire\Blog\Index::class)->name('blog.index');
Route::get('/blog/{post:slug}', App\Livewire\Blog\Show::class)->name('blog.show');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');

Route::get('/admin/verify-otp', VerifyOtp::class)->name('otp.verify');
Route::get('/setup-password/{token}', SetupPassword::class)->name('password.setup');

Route::get('/cohorts/{cohort:slug}/register', \App\Livewire\Cohorts\Register::class)->name('cohorts.register');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
