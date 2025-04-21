@extends('layouts.app') 

@section('title', 'About Art Explorer CMS') 

@section('content')
<div class="container py-5 mt-5 about-page content-section"> 
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Art Explorer CMS</h1>
        <p class="lead">A PHP-based Content Management System inspired by the National Gallery of Art Open Access Dataset</p>
    </div>

    <div class="card shadow-lg mb-5">
        <div class="card-body p-4">
            <h2 class="card-title h4 mb-4"><i class="fas fa-info-circle me-2"></i>PROJECT OVERVIEW</h2>
            <p class="card-text">
                This CMS project was built for an academic assignment focused on PHP, MySQL, and content management systems. It features:
            </p>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">A fully functional admin dashboard for managing content</li>
                <li class="list-group-item">A frontend website that dynamically pulls data from the CMS</li>
                <li class="list-group-item">Integration with a MySQL database</li>
                <li class="list-group-item">Custom design using Bootstrap, Font Awesome, and jQuery</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title h5"><i class="fas fa-desktop me-2"></i>Frontend Features</h3>
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Responsive layout with Bootstrap 5</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Featured artworks gallery</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Artist and period-based filtering</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Artwork detail pages</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Scroll animations and micro-interactions</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Newsletter signup form</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title h5"><i class="fas fa-lock me-2"></i>Backend (Admin) Features</h3>
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Login with password security</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Admin dashboard</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>CRUD operations for artworks and artists</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Image upload</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Relational data using foreign keys</li>
                        <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Customized UI and branding</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h3 class="card-title h5"><i class="fas fa-code me-2"></i>TECHNOLOGIES USED</h3>
            <div class="d-flex flex-wrap gap-2">
                <span class="badge bg-primary">PHP</span>
                <span class="badge bg-secondary">MySQL</span>
                <span class="badge bg-info text-dark">HTML5</span> {{-- Added text-dark for better contrast --}}
                <span class="badge bg-warning text-dark">CSS3</span>
                <span class="badge bg-success">JavaScript</span>
                <span class="badge" style="background-color: #6f42c1; color: white;">Bootstrap 5</span> {{-- Corrected bg-purple --}}
                <span class="badge bg-dark">jQuery</span>
                <span class="badge bg-danger">Font Awesome</span>
                <span class="badge" style="background-color: #20c997; color: white;">Animate.css</span> {{-- Corrected bg-teal --}}
                <span class="badge" style="background-color: #6610f2; color: white;">CKEditor</span> {{-- Corrected bg-indigo --}}
                <span class="badge" style="background-color: #fd7e14; color: white;">MAMP/XAMPP</span> {{-- Corrected bg-orange --}}
                <span class="badge bg-laravel text-white" style="background-color: #ff2d20;">Laravel</span> {{-- Added Laravel badge --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title h5"><i class="fas fa-folder-open me-2"></i>PROJECT STRUCTURE (Laravel)</h3>
                    <pre class="bg-light p-3 rounded"><code>/app/                   - Controllers, Models
/database/              - Migrations, Seeders, Factories
/public/                - Web root, compiled assets
/resources/
  /css/                 - Source CSS (app.css)
  /js/                  - Source JS (app.js)
  /views/               - Blade templates (layouts, pages)
/routes/                - web.php, api.php
/storage/               - Logs, file uploads
.env                    - Environment configuration
vite.config.js          - Asset bundling config</code></pre>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title h5"><i class="fas fa-user-shield me-2"></i>ADMIN CREDENTIALS (Sample)</h3>
                     {{-- Update URL to use Laravel's default --}}
                    <p>Login: <code>{{ url('/login') }}</code></p>
                    {{-- Add note about default Breeze user or your seeded user --}}
                    <p>Default User (if seeded): <code>admin@example.com</code></p>
                    <p>Password (if seeded): <code>password</code></p>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Note:</strong> Use credentials created during registration or seeding. Change default passwords.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h3 class="card-title h5"><i class="fas fa-database me-2"></i>DATA INSPIRATION</h3>
            <p>Inspired by the National Gallery of Art's Open Access dataset:</p>
            <a href="https://github.com/NationalGalleryOfArt/opendata" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">
                <i class="fas fa-external-link-alt me-2"></i>View Dataset
            </a>
            <p class="mt-3">Fields modeled include:</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Artwork title</li>
                <li class="list-group-item">Artist name (preferred_display_name)</li>
                <li class="list-group-item">Artist bio, nationality, birth/death years</li>
                <li class="list-group-item">Image URL, description</li>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h3 class="card-title h5"><i class="fas fa-tasks me-2"></i>ASSIGNMENT CHECKLIST (Laravel Focus)</h3>
            <div class="list-group">
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Laravel project setup</label>
                </div>
                 <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Database Migrations for all tables</label>
                </div>
                 <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Eloquent Models with relationships</label>
                </div>
                 <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Controllers handling requests</label>
                </div>
                 <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Routes defined in web.php</label>
                </div>
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Admin dashboard (using Blade)</label>
                </div>
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Artworks + Artists CRUD functionality (Laravel backend)</label>
                </div>
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Responsive frontend UI (using Blade)</label>
                </div>
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">Dynamic content from database via Eloquent</label>
                </div>
                <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">GitHub repository for Laravel project</label>
                </div>
                 <div class="list-group-item">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">(Optional) Factories and Seeders for testing data</label>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title h5"><i class="fas fa-download me-2"></i>HOW TO INSTALL LOCALLY</h3>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Clone the repo:
                    <pre class="mt-2"><code>git clone [Your Laravel Project Repo URL] art-gallery-laravel</code></pre>
                </li>
                 <li class="list-group-item">Navigate into the directory:
                    <pre class="mt-2"><code>cd art-gallery-laravel</code></pre>
                </li>
                <li class="list-group-item">Install PHP dependencies:
                    <pre class="mt-2"><code>composer install</code></pre>
                </li>
                 <li class="list-group-item">Install JS dependencies:
                    <pre class="mt-2"><code>npm install</code></pre>
                </li>
                 <li class="list-group-item">Create `.env` file (copy from `.env.example`) and configure database details:
                    <pre class="mt-2"><code>cp .env.example .env</code></pre>
                    Then edit `.env` with your DB_DATABASE, DB_USERNAME, DB_PASSWORD.
                </li>
                 <li class="list-group-item">Generate application key:
                    <pre class="mt-2"><code>php artisan key:generate</code></pre>
                </li>
                <li class="list-group-item">Run database migrations (and optionally seed):
                    <pre class="mt-2"><code>php artisan migrate --seed</code></pre>
                     (Ensure your database is created and empty before running)
                </li>
                 <li class="list-group-item">Compile frontend assets:
                    <pre class="mt-2"><code>npm run dev</code></pre>
                     (Or `npm run build` for production)
                </li>
                <li class="list-group-item">Run the development server:
                    <pre class="mt-2"><code>php artisan serve</code></pre>
                    Then access the site at the URL provided (usually http://127.0.0.1:8000).
                </li>
            </ol>
        </div>
    </div>
</div>

@endsection