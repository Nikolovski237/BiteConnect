<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userData = auth()->user();

        return view('admin.dashboard', compact('userData'));
    }
}
