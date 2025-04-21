<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <title>{{ config('app.name', 'Art Explorer CMS') }} - @yield('title', 'Explore Art')</title>

    <meta name="keywords" content="art, gallery, museum, paintings, artists">
    <meta name="description" content="Discover thousands of artworks from renowned artists around the world">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Example: Make primary color available to JS
        // const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color').trim();
    </script>
    <style>
         /* Paste content from php-cm-janines/css/style.css here or in resources/css/app.css */
         :root {
             --primary-color: #d63384;
             --dark-color: #212529;
             --light-color: #f8f9fa;
             --transition-speed: 0.3s;
         }
         body { font-family: 'Raleway', sans-serif; color: #333; background-color: #fff; line-height: 1.6; }
         .navbar { background-color: rgba(0, 0, 0, 0.9) !important; transition: background-color 0.3s ease, box-shadow 0.3s ease; }
         .navbar .nav-link { color: white !important; position: relative; padding: 5px 10px; }
         .navbar .nav-link::after { content: ''; position: absolute; bottom: 0; left: 10px; width: 0; height: 2px; background-color: var(--primary-color); transition: width var(--transition-speed) ease; }
         .navbar .nav-link:hover::after { width: calc(100% - 20px); }
         .navbar.scrolled { background-color: white !important; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
         .navbar.scrolled .nav-link { color: var(--dark-color) !important; }
         .navbar.scrolled .nav-link::after { background-color: var(--primary-color); }
         .scroll-indicator { position: fixed; top: 0; left: 0; height: 4px; background: var(--primary-color); z-index: 1000; transition: width 0.1s; }
         .content-section { opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease, transform 0.6s ease; }
         .content-section.visible { opacity: 1; transform: translateY(0); }
         .hero-section { background: linear-gradient(180deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://img.freepik.com/free-photo/rendering-inspirational-mood-board_23-2150975964.jpg?t=st=1742862171~exp=1742865771~hmac=eaabda60f82a19927b6158223c97f116ed0eb44c09e6208fceae94185cd7257d&w=826') center/cover; color: var(--light-color); text-shadow: 0 0 10px rgba(0, 0, 0, 0.5); padding: 120px 0; position: relative; overflow: hidden; }
         .hero-section::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('https://img.freepik.com/free-photo/rendering-inspirational-mood-board_23-2150975964.jpg?t=st=1742862171~exp=1742865771~hmac=eaabda60f82a19927b6158223c97f116ed0eb44c09e6208fceae94185cd7257d&w=826') center/cover; opacity: 0.2; z-index: 0; }
         .hero-content { position: relative; z-index: 1; }
         .feature-card { text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease; }
         .feature-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); }
         .feature-icon { font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem; }
         footer { background-color: #212529; color: #fff; }
         footer h5, footer h3 { font-family: 'Playfair Display', serif; }
         footer a { color: #ccc; text-decoration: none; }
         footer a:hover { color: #fff; }
         .project-card { transition: all var(--transition-speed) ease; border: none; overflow: hidden; }
         .project-card:hover { transform: translateY(-5px); }
         .project-image-container { position: relative; overflow: hidden; padding-top: 60%; }
         .project-image-container img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
         .project-card:hover .project-image-container img { transform: scale(1.05); }
         .project-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: flex-start; justify-content: flex-end; padding: 1rem; opacity: 0; transition: opacity var(--transition-speed) ease; }
         .project-card:hover .project-overlay { opacity: 1; }
         .filter-form .form-select { width: auto; min-width: 150px; }
         @media (max-width: 768px) { .filter-form .input-group { flex-wrap: wrap; } .filter-form .form-control, .filter-form .form-select { margin-bottom: 10px; width: 100% !important; } .project-image-container { padding-top: 75%; } }
         /* Add preloader styles if you keep it */
         /* .preloader { ... } */
         /* .spinner { ... } */
    </style>
</head>
<body class="antialiased">
    {{--
    <div class="preloader">
        <div class="spinner"></div>
    </div>
     --}}

    <div class="scroll-indicator" style="width: 0%"></div>

    @include('includes.navigation') <main>
        @yield('content') </main>

    @include('includes.footer') <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Include your custom JS - ideally compiled via Vite/Mix --}}
     {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
     <script>
         // Paste JS from php-cm-janines/js/main.js here or include in resources/js/app.js
         $(document).ready(function() {
             // Preloader (Uncomment if used)
             // $(window).on('load', function() {
             //     $('.preloader').fadeOut('slow');
             // });

             // Navbar scroll effect
             $(window).scroll(function() {
                 // Scroll indicator
                 let scrollPercent = ($(window).scrollTop() / ($(document).height() - $(window).height())) * 100;
                 $('.scroll-indicator').css('width', scrollPercent + '%');

                 // Navbar background change
                 if ($(this).scrollTop() > 100) {
                     $('.navbar').addClass('scrolled');
                 } else {
                     $('.navbar').removeClass('scrolled');
                 }

                 // Content section animations
                 $('.content-section').each(function() {
                     let sectionTop = $(this).offset().top;
                     let windowBottom = $(window).scrollTop() + $(window).height();

                     if (sectionTop < windowBottom - 100) {
                         $(this).addClass('visible');
                     }
                 });
             }).trigger('scroll'); // Trigger scroll once on load to apply initial states

             // Smooth scrolling for anchor links (Ensure links have href="#target-id")
             $('a[href*="#"]').not('.no-scroll').not('[href="#"]').on('click', function(e) {
                  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                     var target = $(this.hash);
                     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                     if (target.length) {
                         e.preventDefault();
                         $('html, body').animate({
                             scrollTop: target.offset().top - 70 // Adjust offset for fixed navbar height
                         }, 500, 'linear');
                     }
                 }
             });

             // Mobile menu close on click
             $('.navbar-nav>li>a').on('click', function(){
                 if($('.navbar-toggler').is(':visible')) { // Only close if toggler is visible (mobile)
                     $('.navbar-collapse').collapse('hide');
                 }
             });

             // Navbar link hover effect (adjust based on scrolled state)
             $('.nav-link').hover(
                 function() {
                     $(this).css('color', 'var(--primary-color)'); // Use CSS var directly
                 },
                 function() {
                     if ($('.navbar').hasClass('scrolled')) {
                         $(this).css('color', 'var(--dark-color)'); // Use CSS var
                     } else {
                         $(this).css('color', 'white');
                     }
                 }
             );
             // Ensure initial colors are correct based on scroll state
              $('.navbar .nav-link').each(function() {
                  if ($('.navbar').hasClass('scrolled')) {
                      $(this).css('color', 'var(--dark-color)');
                  } else {
                      $(this).css('color', 'white');
                  }
              });


         });
     </script>
     @stack('scripts') </body>
</html>