@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">Art Explorer CMS</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">Discover thousands of artworks, learn about renowned artists, and dive into the rich details of each piece — all in one place</p>
                    <a href="{{ route('artworks.index') }}"
                       class="btn btn-primary btn-lg animate__animated animate__fadeInUp animate__delay-2s">
                       Explore Collection
                    </a>
                </div>
                <div class="col-lg-5 d-none d-lg-block animate__animated animate__fadeIn animate__delay-1s">
                    {{-- Add an illustrative image if desired --}}
                     <img src="https://media1.giphy.com/media/mPDjPLlff1gDEcji2E/200.webp?cid=82a1493b8sanspt5uu8mkxaqov6pn1o0hpoaipw35kre7jeh&ep=v1_stickers_trending&rid=200.webp&ct=s" alt="Artwork" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 my-5 content-section">
         <div class="container">
             {{-- Content from your old index.php features section --}}
             <div class="row mb-5">
                 <div class="col-lg-8 mx-auto text-center">
                     <h2 class="section-title">Discover the beauty and history of art</h2>
                     <p class="lead">Explore thousands of artworks, learn about renowned artists, and dive into the rich details of each piece—all in one place</p>
                 </div>
             </div>
             <div class="row g-4">
                 {{-- Feature cards --}}
                 <div class="col-md-6 col-lg-3">
                     <div class="feature-card card p-4 h-100">
                         <div class="text-center">
                             <i class="fas fa-palette feature-icon"></i>
                             <h4>Browse Art by Artist</h4>
                             <p>Search and view artworks by your favorite artists...</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-3">
                     <div class="feature-card card p-4 h-100">
                         <div class="text-center">
                             <i class="fas fa-hourglass-half feature-icon"></i>
                             <h4>Explore Art by Period</h4>
                             <p>Travel through time and discover art from different eras...</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-3">
                     <div class="feature-card card p-4 h-100">
                         <div class="text-center">
                             <i class="fas fa-search feature-icon"></i>
                             <h4>Search by Keywords</h4>
                             <p>Looking for something specific? Use our search...</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-3">
                     <div class="feature-card card p-4 h-100">
                         <div class="text-center">
                             <i class="fas fa-info-circle feature-icon"></i>
                             <h4>Artwork Details</h4>
                             <p>Dive deep into each piece with detailed information...</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>


    <section class="py-5 bg-light content-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Featured Artworks</h2>
                    <p class="lead">Explore our curated selection of masterpieces</p>
                </div>
            </div>

             <div class="row g-4"> {{-- Use g-4 for spacing like collection --}}
                 @forelse ($featuredArtworks ?? [] as $artwork) {{-- Assuming controller passes $featuredArtworks --}}
                     <div class="col-md-4 mb-4">
                         <div class="card h-100 project-card"> {{-- Added project-card for consistency --}}
                             <div class="project-image-container">
                             @if ($artwork->image_url)
                                 <img src="{{ $artwork->image_url }}" class="card-img-top" alt="{{ $artwork->title }}">
                             @else
                                 <div class="bg-light p-5 text-muted text-center d-flex align-items-center justify-content-center h-100">No image</div>
                             @endif
                             </div>
                             <div class="card-body">
                                 <h5 class="card-title">{{ $artwork->title }}</h5>
                                 <p class="card-text text-muted">{{ $artwork->artist->preferred_display_name ?? 'Unknown Artist' }}</p>
                                 <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                             </div>
                         </div>
                     </div>
                 @empty
                     <div class="col-12 text-center py-5">
                         <div class="alert alert-info">No featured artworks available at the moment.</div>
                     </div>
                 @endforelse
             </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('artworks.index') }}" class="btn btn-primary">View All Artworks</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white content-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="mb-3">Ready to explore more art?</h2>
                    <p class="lead mb-0">Join our community of art enthusiasts and get access to exclusive content.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                     {{-- Link to register or login page --}}
                     @guest
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">Sign Up Now</a>
                     @else
                         <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg">Go to Dashboard</a>
                     @endguest
                </div>
            </div>
        </div>
    </section>
@endsection