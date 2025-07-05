
<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/property-page.css') }}">
    @endsection
    <x-slot:title>
        Property :: Page
    </x-slot>


    <section id="back" class="">
        <div class="container text-md-start py-5">
            <h1 class="mb-3 text-white ">Find Your Dream Property</h1>
            <p class="back3">
                Welcome to Monarsh Properties, where your dream property awaits in every corner of our beautiful world.
                Explore our curated selection of properties, each offering a unique story and a chance to redefine your
                life. With categories to suit every dreamer, your journey
            </p>
        </div>

        <!-- Unified Search Container -->
        <div class="pb-5 search-wrapper2 container mt-auto position-relative">
            <div class="find d-flex flex-column flex-md-row justify-content-between align-items-center mb-0">
                <p class="find3 mb-2 mb-md-0">Search For a Property</p>
                <p class="find2 mb-0"><i class="bi bi-search"></i> Find Property</p>
            </div>

            <div class="row g-0 px-3 search-wrapper">
                <!-- Location -->
                <div class="col-12 col-md-4 p-1">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                        <select id="location-select" class="form-select form-select-sm locate"
                            aria-label="Select Location">
                            <option value="" selected>Select Location</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                            <option value="3">Location 3</option>
                            <option value="4">Location 4</option>
                        </select>
                    </div>
                </div>

                <!-- Property Type -->
                <div class="col-12 col-md-4 p-1">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-house-heart-fill"></i></span>
                        <select id="property-type-select" class="form-select form-select-sm locate"
                            aria-label="Select Property Type">
                            <option value="" selected>Select Property Type</option>
                            <option value="1">House</option>
                            <option value="2">Land</option>
                        </select>
                    </div>
                </div>

                <!-- Property Status -->
                <div class="col-12 col-md-4 p-1">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-box"></i></span>
                        <select id="property-status-select" class="form-select form-select-sm locate"
                            aria-label="Select Property Status">
                            <option value="" selected>Select Property Status</option>
                            <option value="1">Available</option>
                            <option value="2">Sold</option>
                        </select>
                    </div>
                </div>

            </div>

    </section>


    <section>
        <div class="container mt-5">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-4 mb-4 " data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (41).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 1</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status sold"><i class="fas fa-crown"></i>SOLD</span>
                        <img src="{{ asset('assets/images/Image (42).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">4 Acres of Land </h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (43).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 4</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <!-- Repeat for Card 4, 5, and 6 -->
                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (41).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 2</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status sold"><i class="fas fa-crown"></i>SOLD</span>
                        <img src="{{ asset('assets/images/Image (42).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">4 Acres of Land </h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (43).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 3</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (41).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 2</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status sold"><i class="fas fa-crown"></i>SOLD</span>
                        <img src="{{ asset('assets/images/Image (42).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">4 Acres of Land </h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4" data-aos="zoom-in">
                    <div id="seaside3" class="card h-100">
                        <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                        <img src="{{ asset('assets/images/Image (43).png') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 id="seaside" class="card-title">Seaside Serenity Villa 3</h5>
                            <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful
                                suburban neighborhood... Read More.</p>
                            <p id="veiw"><a class="text-decoration-none text-white"
                                    href="veiw-property-page.html">View Property Details</a></p>
                        </div>
                    </div>
                </div>
    </section>


    <section class="py-4">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-2 mb-md-0">01-05 of 50 results</p>
                <div class="d-flex align-items-center gap-3">
                    <p class="mb-0">1 of 10 pages</p>
                    <a class="text-decoration-none text-dark" href="#">Prev</a>
                    <a class="text-decoration-none text-dark" href="#">Next</a>
                </div>
            </div>
        </div>
    </section>

    <x-news-letter />

</x-main-layout>
