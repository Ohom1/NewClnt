<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Routes
Route::get('/routes', [RouteController::class, 'index'])->name('routes.index');
Route::get('/routes/{slug}', [RouteController::class, 'show'])->name('routes.show');

// Quote
Route::get('/get-a-quote', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/get-a-quote', [QuoteController::class, 'store'])->name('quote.store');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/apply', [CareerController::class, 'apply'])->name('careers.apply');

/*
|--------------------------------------------------------------------------
| API Routes (for Lead Capture)
|--------------------------------------------------------------------------
*/
Route::post('/api/v1/leads', [LeadController::class, 'apiStore']);
Route::post('/webhooks/brevo', [LeadController::class, 'handleBrevoWebhook']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Leads
    Route::resource('leads', LeadController::class);
    Route::post('/leads/{lead}/assign', [LeadController::class, 'assign'])->name('leads.assign');
    Route::post('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.status');
    Route::post('/leads/{lead}/note', [LeadController::class, 'addNote'])->name('leads.note');
    Route::get('/leads/{lead}/timeline', [LeadController::class, 'timeline'])->name('leads.timeline');
    
    // Lead Communications
    Route::post('/leads/{lead}/email', [LeadController::class, 'sendEmail'])->name('leads.email');
    Route::post('/leads/{lead}/whatsapp', [LeadController::class, 'sendWhatsApp'])->name('leads.whatsapp');
    
    // Users
    Route::resource('users', UserController::class);
    
    // Reports
    Route::get('/reports/performance', [AdminController::class, 'performanceReport'])->name('reports.performance');
    Route::get('/reports/leads', [AdminController::class, 'leadsReport'])->name('reports.leads');
    Route::get('/reports/export', [AdminController::class, 'exportReport'])->name('reports.export');
});

// Auth routes
require __DIR__.'/auth.php';
