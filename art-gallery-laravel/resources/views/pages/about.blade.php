@extends('layouts.app')

@section('title', 'About Us')

@section('content')
{{-- Copy content from php-cm-janines/pages/about.php --}}
{{-- Replace PHP includes/requires with Blade directives --}}
{{-- Use asset() or Vite/Mix helpers for images/CSS/JS if needed --}}
<div class="container py-5 mt-5 about-page content-section"> {{-- Added mt-5 and content-section --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Art Explorer CMS</h1>
        <p class="lead">A PHP-based Content Management System inspired by the National Gallery of Art Open Access Dataset</p>
    </div>

     {{-- Keep the rest of the HTML structure from php-cm-janines/pages/about.php --}}
     <div class="card shadow-lg mb-5">
         {{-- ... card content ... --}}
     </div>
     <div class="row">
          {{-- ... row content ... --}}
     </div>
     {{-- ... other cards and sections ... --}}

</div>

{{-- Add the specific styles for this page if needed, or move to app.css --}}
 @push('styles') {{-- Use @push for page-specific additions --}}
 <style>
     .about-page { max-width: 1200px; }
     .bg-purple { background-color: #6f42c1; }
     /* ... other specific styles ... */
     .card { border: none; border-radius: 10px; transition: transform 0.3s ease, box-shadow 0.3s ease; }
     .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
 </style>
 @endpush

@endsection