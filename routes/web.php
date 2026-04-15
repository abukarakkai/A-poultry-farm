<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('home');
});


Route::get('/login', function () {
    abort(404);
});

Route::get('/admin-access-portal-AX92k', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/admin-access-portal-AX92k', [AuthenticatedSessionController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/records', [RecordController::class,'index'])->name('records.index');
    Route::post('/records', [RecordController::class,'store'])->name('records.store');
    Route::get('/records/{id}', [RecordController::class, 'show'])->name('records.show');
    Route::put('/records/{id}', [RecordController::class, 'update'])->name('records.update');

    Route::get('/records/export', [RecordController::class, 'export'])->name('records.export');
    Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');


});

// Route::resource('pens', PenController::class)->middleware(['auth']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pens', [PenController::class, 'index'])->name('pens.index');
    Route::post('/pens', [PenController::class, 'store'])->name('pens.store');
    Route::get('/pens/{pen}', [PenController::class, 'show'])->name('pens.show');
    Route::put('/pens/{id}', [PenController::class, 'update'])->name('pens.update');
    Route::delete('/pens/{pen}', [PenController::class, 'destroy'])->name('pens.destroy');
});


    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
        Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
        Route::get('/sales/{id}', [SaleController::class, 'show']);
        Route::put('/sales/{id}', [SaleController::class, 'update']);
        Route::delete('/sales/{id}', [SaleController::class, 'destroy']);
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
        Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
        Route::get('/expenses/{id}', [ExpenseController::class, 'show']);
        Route::put('/expenses/{id}', [ExpenseController::class, 'update']);
        Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);
    });


    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
        Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
            Route::post('/settings/system', [SettingController::class, 'updateSystem'])->name('settings.system');
            Route::post('/settings/profile', [SettingController::class, 'updateProfile'])->name('settings.profile');    });



require __DIR__.'/auth.php';
