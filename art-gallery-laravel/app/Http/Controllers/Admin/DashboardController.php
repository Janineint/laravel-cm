<?php

namespace App\Http\Controllers\Admin; // Correct namespace for Admin controllers

use App\Http\Controllers\Controller; // Import the base Controller
use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View // Add this index method
    {
        // You can add logic here later to fetch data specific to the dashboard if needed
        // For now, just return the dashboard view

        return view('admin.dashboard');
        // Corresponds to resources/views/admin/dashboard.blade.php
    }
}