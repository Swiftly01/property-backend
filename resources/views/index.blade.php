<x-main-layout>
    <x-slot:title>
        Monarsh Property
        </x-slot>

        <section class="p-0 m-0 products">
            <div class="container">
                <div class="row">
                    <div id="products2" class="col-12 col-md-8">

                        <div class="dream">
                            <h1 class="dream2">
                                Discover Your Dream Property with <span class="monarsh">MONARSH PROPERTIES</span>
                            </h1>
                            <img id="reach" src="{{ asset('assets/images/Sub Container.png') }}" height="130px"
                                width="130px" alt="">
                        </div>

                        <p class="journey">
                            Your journey to finding the perfect property begins here. Explore our listings to find the
                            home
                            that matches
                            your dreams.
                        </p>
                        <a class="button2" href="{{ route('property') }}">Browse Properties</a>


                        <div class="py-5">
                            <!-- BUY and SELL Buttons -->
                            <div class="d-flex">
                                <a class="buy-sell me-3" href="{{ route('property') }}">BUY</a>
                                <a class="buy-sell2" href=" {{ route('sellRequest.create') }}">SELL</a>
                            </div>

                            <form action="{{ route('property') }}" method="GET">

                                <!-- Filter Section -->
                                <div
                                    class="d-flex flex-column flex-lg-row align-items-end col-md-7 justify-content-between action">

                                    <!-- Location Filter -->
                                    <div class="mb-3 mb-lg-0 me-lg-3 w-100">
                                        <label for="location" class="form-label fw-bold">
                                            Location <i class="bi bi-geo-alt-fill"></i>
                                        </label>

                                        <select id="locate" name="location" class="form-select form-select-sm"
                                            aria-label="Select location">
                                            <option disabled {{ old("location", "FCT" )===null ? "selected" : "" }}>
                                                Select your state</option>

                                            @foreach (\App\Enums\LocationEnum::cases() as $case)
                                            <option {{ old('location', "FCT" )===$case->value ? 'selected' : '' }}
                                                value="{{ $case->value }}">{{ $case->label() }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                    <!-- Property Type Filter -->
                                    <div class="mb-3 mb-lg-0 me-lg-3 w-100">
                                        <label for="propertyType" class="form-label fw-bold">Property Type</label>
                                        <select id="propertyType" class="form-select form-select-sm"
                                            aria-label="Select property type" name="property_type">
                                            <option disabled {{ old("property_type", \App\Enums\PropertyTypeEnum::HOUSE
                                                ) }}>Select property type</option>

                                            @foreach (\App\Enums\PropertyTypeEnum::cases() as $case)
                                            <option value="{{ $case->value }}" {{ old('property_type',
                                                \App\Enums\PropertyTypeEnum::HOUSE )===$case->value ?
                                                'selected' : '' }}>
                                                {{ $case->label() }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <!-- Search Icon -->
                                    <div id="locate3">
                                        <button id="locate3" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-3  overflow-hidden w-100 zapier2">
            <div class="text-white scroll-container">
                <div class="scroll-row">
                   
                    <p> <img style="width: 80px" src="{{ asset('assets/images/76Blue.jpg') }}" alt="partners"> 76Blue</p>
                    <p> <img style="width: 80px" src="{{ asset('assets/images/lifemate.webp') }}" alt="partners"> Lifemate</p>
                    <p> <img style="width: 90px" src="{{ asset('assets/images/techpro_img.png') }}" alt="partners">Techpro</p>
                    <p><img style="width: 80px; height: 40px;" src="{{ asset('assets/images/partner-1.png') }}" alt="partners"> Comfort shortlet apartment</p>
                     <p> <img style="width: 80px" src="{{ asset('assets/images/76Blue.jpg') }}" alt="partners"> 76Blue</p>
                    <p> <img style="width: 80px" src="{{ asset('assets/images/lifemate.webp') }}" alt="partners"> Lifemate</p>
                    <p> <img style="width: 90px" src="{{ asset('assets/images/techpro_img.png') }}" alt="partners">Techpro</p>
                    <p><img style="width: 80px; height: 40px;" src="{{ asset('assets/images/partner-1.png') }}" alt="partners"> Comfort shortlet apartment</p>
                     <p> <img style="width: 80px" src="{{ asset('assets/images/76Blue.jpg') }}" alt="partners"> 76Blue</p>
                    <p> <img style="width: 80px" src="{{ asset('assets/images/lifemate.webp') }}" alt="partners"> Lifemate</p>
                    <p> <img style="width: 90px" src="{{ asset('assets/images/techpro_img.png') }}" alt="partners">Techpro</p>
                    <p><img style="width: 80px; height: 40px;" src="{{ asset('assets/images/partner-1.png') }}" alt="partners"> Comfort shortlet apartment</p>
                   
                
                </div>
            </div>
        </section>


        <section class="reliable3">
            <div class="container py-4">
                <div class="mb-6 row align-items-center">
                    <!-- Left Column (Text and Image) -->
                    <div class="mb-4 col-12 col-md-5" data-aos="fade-right">
                        <div class="card h-100">
                            <div class="p-5 card-body platform">
                                <h4 class="card-title reliable"><strong>Your reliable platform for the perfect property
                                        solution</strong>
                                </h4>
                                <p class="card-text reliable2">
                                    We connect you with the right opportunities through trusted insights, expert
                                    support,
                                    and tailored
                                    solutions—making your property journey seamless, successful, and stress-free.
                                </p>
                                <a class="mb-3 button2" href="{{ route('property') }}">Browse Properties</a>
                                <div>
                                    <img src="{{ asset('assets/images/Illustration.png') }}" width="400" height="150"
                                        alt="" class="mt-2 img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (4 Cards) -->
                    <div class="col-12 col-md-7">
                        <div class="row g-3">
                            <!-- Card 1 -->
                            <div class="col-12 col-sm-6">
                                <div class="p-4 text-center card h-100" data-aos="zoom-in" data-aos-delay="100">
                                    <img src="{{ asset('assets/images/Container.png') }}" alt="" class="mb-2 img-fluid"
                                        style="width: 60px; margin: auto;">
                                    <div class="card-body">
                                        <h6 class="mb-2 card-title">Trusted Expertise</h6>
                                        <p class="card-text medium">Benefit from years of experience and local market
                                            knowledge to make
                                            informed decisions.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-12 col-sm-6">
                                <div class="p-4 text-center card h-100" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="{{ asset('assets/images/Container.png') }}" alt="" class="mb-2 img-fluid"
                                        style="width: 60px; margin: auto;">
                                    <div class="card-body">
                                        <h6 class="mb-2 card-title">End-to-End Support</h6>
                                        <p class="card-text medium">From search to settlement, we offer guidance and
                                            peace
                                            of mind at every
                                            step.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-12 col-sm-6">
                                <div class="p-4 text-center card h-100" data-aos="zoom-in" data-aos-delay="300">
                                    <img src="{{ asset('assets/images/Container.png') }}" alt="" class="mb-2 img-fluid"
                                        style="width: 60px; margin: auto;">
                                    <div class="card-body">
                                        <h6 class="mb-2 card-title">Tailored Solutions</h6>
                                        <p class="card-text medium">Our approach helps match properties to your
                                            lifestyle,
                                            goals, and budget.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-12 col-sm-6">
                                <div class="p-4 text-center card h-100" data-aos="zoom-in" data-aos-delay="400">
                                    <img src="{{ asset('assets/images/Container.png') }}" alt="" class="mb-2 img-fluid"
                                        style="width: 60px; margin: auto;">
                                    <div class="card-body">
                                        <h6 class="mb-2 card-title">Customer Focus</h6>
                                        <p class="card-text medium">We prioritize your needs and guide you with a
                                            personalized experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="sold" class="px-3 py-5">
            <div class="container">
                <!-- Header -->
                <div>
                    <h2 class="mb-3 text-center property">Featured Properties</h2>
                    <p class="text-center Property2">
                        Explore our handpicked selection of featured properties. Each listing offers a glimpse into
                        exceptional homes
                        and investments available through Monarsh Properties. Click "View Details" for more information.
                    </p>
                </div>

                <!-- Filter Buttons -->
                <div class="mt-4 text-center">
                    <div class="px-3 py-2 prop d-inline-block">
                        <div
                            class="gap-3 d-flex flex-column filter flex-md-row justify-content-center align-items-center">

                            <a class="{{ request('status') === null ? 'active' : '' }}" href="{{ route('home') }}">All
                                Feature
                                Properties</a>

                            <a class="{{ request('status') === 'available' ? 'active' : '' }}"
                                href="{{ route('home', ['status' => \App\Enums\PropertyStatusEnum::AVAILABLE]) }}">Available
                                Properties</a>
                            <a class="{{ request('status') === 'sold' ? 'active' : '' }}"
                                href="{{ route('home', ['status' => \App\Enums\PropertyStatusEnum::SOLD]) }}">Sold
                                Properties</a>

                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="row">

                        @forelse ($properties as $property)
                        <x-card :property="$property" />

                        @empty
                        @endforelse

                        {{ $properties->onEachSide(2)->links() }}

                    </div>
                    <div>
                        <p id="browse"> <a class="text-white text-decoration-none" href="{{ route('property') }}">Browse
                                All Properties</a>
                        </p>
                    </div>
                </div>
        </section>



        <section class="py-5 bg-white">
            <div class="container">
                <h1 class="mb-5 text-center">What our clients say</h1>

                <div class="row align-items-center">

                    <!-- Carousel Text Content -->
                    <div style="background-color: #EFEFEF;" class="p-5 mb-4 rounded col-12 col-md-6 mb-md-0">
                        <div id="testimonialTextCarousel" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <!-- Testimonial 1 -->
                                <div class="carousel-item active">
                                    <h5>Bought a house in Lugbe, Abuja</h5>
                                    <p>
                                        Monarsh Property made owning a home in Nigeria from abroad a reality.
                                        Their transparency and regular updates gave me peace of mind.
                                        I felt in control, even from thousands of miles away.
                                    </p>
                                    <div class="mt-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/testimonial-image.jpg') }}" alt="Profile"
                                            class="me-2 rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <strong>Chinedu A.</strong><br>
                                            <small>Lagos</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 2 -->
                                <div class="carousel-item">
                                    <h5>Bought land in Lekki, Lagos</h5>
                                    <p>
                                        Smooth process! Monarsh kept me updated every step.
                                        I didn’t need to fly down to handle the purchase.
                                    </p>
                                    <div class="mt-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/testimonial-image.jpg') }}" alt="Profile"
                                            class="me-2 rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <strong>Amaka O.</strong><br>
                                            <small>Lekki</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 3 -->
                                <div class="carousel-item">
                                    <h5>Bought an apartment in Ikoyi, Lagos</h5>
                                    <p>
                                        From inquiry to handover, the experience was seamless.
                                        I always felt secure investing with Monarsh.
                                    </p>
                                    <div class="mt-3 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/testimonial-image.jpg') }}" alt="Profile"
                                            class="me-2 rounded-circle"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <strong>David K.</strong><br>
                                            <small>Bourdillon</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#testimonialTextCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#testimonialTextCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>

                        </div>
                    </div>

                    <!-- Static Image -->
                    <div class="col-12 col-md-6">
                        <img src="{{ asset('assets/images/client-house.jpg') }}" alt="Testimonial House"
                            class="rounded shadow img-fluid">
                    </div>
                </div>
            </div>
        </section>



        <section id="click">
            <div class="container">
                <div class="clicked">
                    <div>
                        <h2 class="clicked3">Your Dream Property, One Click Away</h2>
                    </div>
                    <div>
                        <p class="clicked2">Whether it’s selling your current home, getting financing, or buying a new
                            home, we make
                            it easy and efficient. The best part? you’ll save a bunch of money and time with our
                            services.
                        </p>
                    </div>
                </div>

                <div class="container my-5">
                    <div class="row align-items-stretch">
                        <!-- Buy a Property -->
                        <div class="mb-4 col-12 col-md-6 h-100">
                            <div class="buying h-100">
                                <h2>Buy a Property</h2>
                                <p id="your2">
                                    We are your trusted buyer’s agent, committed to making your property purchase
                                    smooth,
                                    secure, and
                                    successful. With expert market knowledge, honest advice, and personalised support,
                                    we
                                    work solely in
                                    your interest—ensuring you find the right property at the right price, without the
                                    stress.
                                </p>
                                <p id="your" class="text-white">
                                    <a class="text-white text-decoration-none" href="{{ route('property') }}"> Explore
                                        Listings</a> <span><i class="bi bi-arrow-right"></i></span>
                                </p>
                            </div>
                        </div>

                        <!-- Sell a Property -->
                        <div class="mb-4 col-12 col-md-6 h-100">
                            <div class="buying2 h-100">
                                <h3>Sell a Property</h3>
                                <p id="your2">
                                    Looking to sell your property and want a reliable, trustworthy partner to help you
                                    get
                                    its true market
                                    value? At Monarsh Property, we specialise in delivering a seamless selling
                                    experience—from accurate
                                    property valuation to targeted marketing and negotiation support. Reach out to us
                                    today
                                    and experience
                                    property selling like never before.
                                </p>
                                <p id="your" class="text-white">
                                    <a class="text-white text-decoration-none"
                                        href="{{ route('sellRequest.create') }}">Sell Your
                                        Property</a> <span><i class="bi bi-arrow-right"></i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Stats Section -->
                <div class="container my-4">
                    <div class="text-center row">
                        <!-- Stat 1 -->
                        <div class="mb-4 col-6 col-md-3">
                            <div class="time">
                                <p class="mb-1 fs-4 fw-bold"><span class="counter" data-target="100"
                                        data-suffix="%">0%</span></p>
                                <p class="mb-0 daily">Property Return Rate</p>
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="mb-4 col-6 col-md-3">
                            <div class="time">
                                <p class="mb-1 fs-4 fw-bold"><span class="counter" data-target="100"
                                        data-suffix="%">0%</span></p>
                                <p class="mb-0 daily">Customer Satisfaction</p>
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="mb-4 col-6 col-md-3">
                            <div class="time">
                                <p class="mb-1 fs-4 fw-bold"><span class="counter" data-target="100">0%</span></p>
                                <p class="mb-0 daily">Property in Sell & Rent</p>
                            </div>
                        </div>

                        <!-- Stat 4 -->
                        <div class="mb-4 col-6 col-md-3">
                            <div class="time2">
                                <p class="mb-1 fs-4 fw-bold"><span class="counter" data-target="5">0</span>+</p>
                                <p class="mb-0 daily">Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>



        <section id="question">
            <div class="container py-5">
                <div class="mb-4 text-center row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <h1>Frequently Asked Questions</h1>
                        <p>
                            Still have any questions? Contact our team via
                            <a id="support" href="mailto:support@monarshproperty.com"
                                class="text-decoration-none">support@Monarshproperty.com</a>
                        </p>
                    </div>
                </div>

                <div class="accordion-custom">
                    <!-- FAQ Item -->
                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">What services does Monarsh Property offer?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            We provide property buying, selling, investment advice, and market valuation service
                            tailored to
                            your needs.
                        </div>
                    </div>

                    <!-- Repeat for each FAQ -->
                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">Can Monarsh help me buy property from abroad?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            Yes, Monarsh provides full support for international buyers, from property selection to
                            legal
                            processing.
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">How does Monarsh determine the market value of my property?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            We use recent market data, property condition, and expert evaluations to provide accurate
                            estimates.
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">What areas do you cover?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            We cover major Nigerian cities such as Lagos, Abuja, Port Harcourt, and beyond.
                        </div>
                    </div>


                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">How long does it take to sell a property with Monarsh?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            On average, it takes between 4–12 weeks depending on the location and property condition.
                        </div>
                    </div>



                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">Do you offer legal support during property transactions?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            Yes, we provide legal assistance and connect clients with experienced property lawyers.
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">How can I start working with Monarsh?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            Just fill out our contact form, or reach out via phone or email to schedule a consultation.
                        </div>
                    </div>



                    <div class="p-3 mb-2 bg-white border faq-item rounded-3">
                        <div class="cursor-pointer faq-question d-flex justify-content-between align-items-center"
                            onclick="toggleFAQ(this)">
                            <p class="mb-0 fw-medium">Is there a fee for your services?</p>
                            <span class="icon">+</span>
                        </div>
                        <div class="mt-2 faq-answer" style="display: none;">
                            We offer free consultations. Fees vary depending on services and will be clearly explained
                            upfront.
                        </div>
                    </div>



                    <!-- Add more FAQs here following the same structure -->

                </div>
            </div>
        </section>


        <x-news-letter />




</x-main-layout>