<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/podcast.css') }}">
    @endsection
    <x-slot:title>
        Podcasts
    </x-slot>



    <section id="podcast" class="py-4">
        <div class="container text-md-start">
            <h1 class="text-white mb-3">
                Monarsh Property Podcast: Insights, Stories & Expert Advice
            </h1>
            <p class="text-white lead">
                Stay informed with expert interviews, market trends, and tips to help you make smart property
                decisions—whether you’re buying, selling, or investing.
            </p>
        </div>
    </section>



    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <!-- First Card (Left, bigger) -->
                <div class="col-12 col-md-7">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="https://www.youtube.com/hussein/composer">
                            <img src="{{ asset('assets/images/Frame 6.png') }}" class="card-img-top object-cover rounded-top" alt="Image 1"
                                style="height: 300px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">The Property Blueprint</h6>
                            <p class="card-text">A video podcast dedicated to helping you understand the property
                                market, from investment tips to behind-the-scenes of dream home builds.</p>
                        </div>
                    </div>
                </div>

                <!-- Second Card (Right) -->
                <div class="col-12 col-md-5">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="https://www.youtube.com/hussein/composer">
                            <img src="{{ asset('assets/images/Frame 6 (3).png') }}" class="card-img-top object-cover rounded-top"
                                alt="Image 2" style="height: 300px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">Brick by Brick</h6>
                            <p class="card-text">Join us as we break down property trends, custom home builds, and real
                                estate insights across Nigeria and beyond. Real stories, real experts, real estate—brick
                                by brick.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="row g-4">
                <!-- Third Card -->
                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="https://www.youtube.com/hussein/composer">
                            <img src="{{ asset('assets/images/Frame 6 (3).png') }}" class="card-img-top object-cover rounded-top"
                                alt="Image 3" style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">Brick by Brick</h6>
                            <p class="card-text">Join us as we break down property trends, custom home builds, and real
                                estate insights across Nigeria and beyond. Real stories, real experts, real estate—brick
                                by brick.</p>
                        </div>
                    </div>
                </div>

                <!-- Fourth Card -->
                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="https://www.youtube.com/hussein/composer">
                            <img src="{{ asset('assets/images/Frame 6 (4).png') }}" class="card-img-top object-cover rounded-top"
                                alt="Image 4" style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">Built to Inspire</h6>
                            <p class="card-text">Explore stunning homes, smart design, and visionary architecture. Each
                                episode dives into real build projects and the creative minds behind them.</p>
                        </div>
                    </div>
                </div>

                <!-- Fifth Card -->
                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="https://www.youtube.com/hussein/composer">
                            <img src="{{ asset('assets/images/Frame 6 (5).png') }}" class="card-img-top object-cover rounded-top"
                                alt="Image 5" style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">The Property Blueprint</h6>
                            <p class="card-text">A video podcast dedicated to helping you understand the property
                                market, from investment tips to behind-the-scenes of dream home builds.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








</x-main-layout>
