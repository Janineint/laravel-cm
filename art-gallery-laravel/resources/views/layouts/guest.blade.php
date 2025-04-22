<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Use your app's name --}}
        <title>{{ config('app.name', 'Art Explorer CMS') }} - Authentication</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-color: #f8f9fa; /* Light background for auth pages */
            }
            .auth-card {
                max-width: 450px;
                margin: 5rem auto; /* Center card with margin top/bottom */
                padding: 2rem;
                background-color: #ffffff;
                border-radius: 0.5rem;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }
            .auth-logo {
                text-align: center;
                margin-bottom: 1.5rem;
                font-family: 'Playfair Display', serif;
                font-size: 1.8rem;
                color: var(--primary-color, #d63384); /* Use primary color from your theme */
            }
             .auth-logo a {
                text-decoration: none;
                color: inherit;
             }
        </style>
        </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="container">
             {{-- Wrap content in a centered card using Bootstrap --}}
            <div class="auth-card">
                 {{-- Logo Section --}}
                 <div class="auth-logo">
                     <a href="/">
                         {{-- You can use text or an image logo --}}
                         {{-- <img src="/path/to/logo.png" alt="Logo" width="100"> --}}
                         {{ config('app.name', 'Art Explorer CMS') }}
                     </a>
                 </div>

                 {{-- The $slot variable contains the actual form from login.blade.php or register.blade.php --}}
                {{ $slot }}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @vite(['resources/js/app.js'])
         </body>
</html>