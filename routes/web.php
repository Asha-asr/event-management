<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EventCreate;
use App\Livewire\EventList;
use App\Livewire\EventDetail;
use App\Livewire\InvitationResponse;
use App\Livewire\RequisitionList;
use App\Livewire\GalleryUpload;
use App\Livewire\GalleryView;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->prefix('events')->group(function () {
    Route::get('/', EventList::class)->name('events.list');
    Route::get('/create', EventCreate::class)->name('events.create');
    Route::get('/{event}', EventDetail::class)->name('events.detail');
    Route::get('/{event}/requisition', RequisitionList::class)->name('requisition.list');
    Route::get('/{event}/gallery/upload', GalleryUpload::class)->name('gallery.upload');
    Route::get('/{event}/gallery', GalleryView::class)->name('gallery.view');
});

Route::middleware(['auth'])->get('/invitation/{event}/respond', InvitationResponse::class)
    ->name('invitation.respond');
    

// Route::middleware(['auth'])->group(function () {
//     Route::get('/events', EventList::class)->name('events.list');
//     Route::get('/events/create', EventCreate::class)->name('events.create');
//     Route::get('/events/{event}', EventDetail::class)->name('events.detail');
//     Route::get('/invitation/{event}/respond', InvitationResponse::class)->name('invitation.respond');
//     Route::get('/events/{event}/requisition', RequisitionList::class)->name('requisition.list');
//     Route::get('/events/{event}/gallery/upload', GalleryUpload::class)->name('gallery.upload');
//     Route::get('/events/{event}/gallery', GalleryView::class)->name('gallery.view');
// });


require __DIR__.'/auth.php';

// Route::get('/events', function () {
//     return view('events.index');
// })->middleware('auth');
