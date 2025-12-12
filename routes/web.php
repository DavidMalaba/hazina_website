<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Programs;
use App\Livewire\Contact;
use App\Livewire\Partners;
use App\Livewire\Blog\Index;
use App\Livewire\Blog\Show;

Route::get('/', App\Livewire\Home::class)->name('home');
Route::get('/about', App\Livewire\About::class)->name('about');
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
