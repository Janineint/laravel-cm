<footer class="py-5 content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 class="text-white mb-4">Art Explorer</h3>
                <p>Discover the world's art heritage through our comprehensive collection and educational resources.</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="text-white mb-4">Explore</h5>
                <ul class="list-unstyled">
                     {{-- Use route() helper for links --}}
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li class="mb-2"><a href="{{ route('artworks.index') }}" class="text-white-50">Gallery</a></li>
                    <li class="mb-2"><a href="{{ route('artworks.index') }}" class="text-white-50">Collections</a></li> {{-- Link to same as gallery --}}
                    <li class="mb-2"><a href="{{ route('artists.index') }}" class="text-white-50">Artists</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="text-white mb-4">Resources</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50">Blog</a></li> {{-- Add routes if these pages exist --}}
                    <li class="mb-2"><a href="#" class="text-white-50">Tutorials</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">API</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">Help Center</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p class="text-white-50">Subscribe to get updates on new artworks and features.</p>
                {{-- Add proper form handling (route, CSRF) if implementing newsletter --}}
                <form class="mt-3" action="#" method="POST">
                     @csrf {{-- Add CSRF token --}}
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Your email" required>
                        <button class="btn btn-light" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-4 bg-secondary">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="small mb-0">&copy; {{ date('Y') }} Art Explorer CMS. All rights reserved.</p> {{-- Dynamic year --}}
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-white-50"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item mx-2"><a href="#" class="text-white-50"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item me-2"><a href="#" class="text-white-50"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white-50"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>