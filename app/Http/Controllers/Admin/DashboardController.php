<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $stats=[
            'doctors' => User::whereHas('roles', fn($q) => $q->where('name', 'doctor'))->count(),
            'patients' => User::whereHas('roles', fn($q) => $q->where('name', 'patient'))->count(),
            'total_users' => User::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}

