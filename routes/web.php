<?php

use App\Http\Controllers\Admin\{
    AboutController,
    ContactController,
    DashboardController as AdminDashboardController,
    ImageController,
    UserController
};
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Doctor\{
    AppointmentController as DoctorAppointmentController,
    DashboardController as DoctorDashboardController,
    PatientController,
    ProfileController as DoctorProfileController
};
use App\Http\Controllers\Patient\{
    AppointmentController as PatientAppointmentController,
    DashboardController as PatientDashboardController,
    ProfileController as PatientProfileController
};
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('users', UserController::class);
    Route::post('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.role.update');

    // About Us Management
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    // Contact Management
    Route::get('/contact', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');

    // Image Gallery Management
    Route::resource('images', ImageController::class);
});

// Doctor routes
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');

    // Appointments
    Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('appointments');
    Route::get('/appointments/{appointment}', [DoctorAppointmentController::class, 'show'])->name('appointments.show');
    Route::put('/appointments/{appointment}', [DoctorAppointmentController::class, 'update'])->name('appointments.update');

    // Patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

    // Profile
    Route::get('/profile', [DoctorProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [DoctorProfileController::class, 'update'])->name('profile.update');
});

// Patient routes
Route::middleware(['auth', 'role:patient'])->prefix('patient')->name('patient.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');

    // Appointments
    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments');
    Route::get('/appointments/create', [PatientAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [PatientAppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}', [PatientAppointmentController::class, 'show'])->name('appointments.show');
    Route::delete('/appointments/{appointment}', [PatientAppointmentController::class, 'cancel'])->name('appointments.cancel');

    // Profile
    Route::get('/profile', [PatientProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [PatientProfileController::class, 'update'])->name('profile.update');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// 404 fallback route
Route::fallback(function () {
    return view('errors.404');
});
