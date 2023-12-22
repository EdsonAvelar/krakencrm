<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use Inertia\Inertia;
use Illuminate\Foundation\Application;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        return Inertia::render('TenantDashboard', [
            'tenant_id' => tenant('id')

        ]);
    });



    Route::get('/login', function () {
        return Inertia::render('TenantAuth/Login', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    //Route::get('/login', [AdminController::class, 'login'])->name('login.index');

    Route::post('/login', [AdminController::class, 'login'])->name('tenant.login');


    Route::group(['middleware' => 'auth'], function () {


        Route::get('/crm', [DashboardController::class, 'dashboard'])->name('home');



    });



});

