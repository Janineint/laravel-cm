<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class PageController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about(): View // Add this method
    {
        // Simply return the static about view
        return view('pages.about');
        // Corresponds to resources/views/pages/about.blade.php
    }

    // You can add methods for other static pages here if needed
    // public function contact(): View
    // {
    //     return view('pages.contact');
    // }
}