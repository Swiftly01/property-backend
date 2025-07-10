<x-main-layout>
    <x-slot:title>
        Monarsh Property
    </x-slot>

    <section class="products p-0 m-0">
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
                        Your journey to finding the perfect property begins here. Explore our listings to find the home
                        that matches
                        your dreams.
                    </p>
                    <a class="button2" href="">Browse Properties</a>


                    <div class="py-5">
                        <!-- BUY and SELL Buttons -->
                        <div class="d-flex">
                            <a class="buy-sell me-3" href="property-page.html">BUY</a>
                            <a class="buy-sell2" href="list-property-page.html">SELL</a>
                        </div>

                        <!-- Filter Section -->
                        <div
                            class="d-flex flex-column flex-lg-row align-items-end col-md-7 justify-content-between action">

                            <!-- Location Filter -->
                            <div class="mb-3 mb-lg-0 me-lg-3 w-100">
                                <label for="location" class="form-label fw-bold">
                                    Location <i class="bi bi-geo-alt-fill"></i>
                                </label>
                                <select id="locate" class="form-select form-select-sm" aria-label="Select location">
                                    <option selected disabled>Select your state</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                    <option value="FCT">Abuja (FCT)</option>
                                </select>

                            </div>

                            <!-- Property Type Filter -->
                            <div class="mb-3 mb-lg-0 me-lg-3 w-100">
                                <label for="propertyType" class="form-label fw-bold">Property Type</label>
                                <select id="propertyType" class="form-select form-select-sm"
                                    aria-label="Select property type">
                                    <option selected>Select property type</option>
                                    <option value="land">Land</option>
                                    <option value="house">House</option>
                                </select>

                            </div>

                            <!-- Search Icon -->
                            <div id="locate3">
                                <button id="locate3" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="w-100 overflow-hidden zapier2 py-3">
        <div class="scroll-container text-white">
            <div class="scroll-row d-flex align-items-center">
                <p class="zapier"><i class="bi bi-zap"></i> Zapier</p>
                <p class="zapier"><i class="bi bi-spotify"></i> Spotify</p>
                <p class="zapier"><i class="bi bi-camera-video"></i> Zoom</p>
                <p class="zapier"><i class="bi bi-slack"></i> Slack</p>
                <p class="zapier"><i class="bi bi-amazon"></i> Amazon</p>
                <p class="zapier"><i class="bi bi-ad"></i> Adobe</p>
                <img class="zapier3 img-fluid" src="{{ asset('assets/images/Logo (3).png') }}" alt="Custom Logo"
                    style="height: 30px; margin-left: 1rem;">
                <!-- Repeat to make continuous -->
                <p class="zapier"><i class="bi bi-zap"></i> Zapier</p>
                <p class="zapier"><i class="bi bi-spotify"></i> Spotify</p>
                <p class="zapier"><i class="bi bi-camera-video"></i> Zoom</p>
                <p class="zapier"><i class="bi bi-slack"></i> Slack</p>
                <p class="zapier"><i class="bi bi-amazon"></i> Amazon</p>
                <p class="zapier"><i class="bi bi-ad"></i> Adobe</p>
            </div>
        </div>
    </section>


    <section class="reliable3">
        <div class="container py-4">
            <div class="row align-items-center mb-6">
                <!-- Left Column (Text and Image) -->
                <div class="col-12 col-md-5 mb-4" data-aos="fade-right">
                    <div class="card h-100">
                        <div class="card-body platform p-5">
                            <h4 class="card-title reliable"><strong>Your reliable platform for the perfect property
                                    solution</strong>
                            </h4>
                            <p class="card-text reliable2">
                                We connect you with the right opportunities through trusted insights, expert support,
                                and tailored
                                solutions—making your property journey seamless, successful, and stress-free.
                            </p>
                            <a class="button2 mb-3" href="property-page.html">Browse Properties</a>
                            <div>
                                <img src="{{ asset('assets/images/Illustration.png') }}" width="400"
                                    height="150" alt="" class="img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column (4 Cards) -->
                <div class="col-12 col-md-7">
                    <div class="row g-3">
                        <!-- Card 1 -->
                        <div class="col-12 col-sm-6">
                            <div class="card text-center p-4 h-100" data-aos="zoom-in" data-aos-delay="100">
                                <img src="{{ asset('assets/images/Container.png') }}" alt=""
                                    class="img-fluid mb-2" style="width: 60px; margin: auto;">
                                <div class="card-body">
                                    <h6 class="card-title mb-2">Trusted Expertise</h6>
                                    <p class="card-text medium">Benefit from years of experience and local market
                                        knowledge to make
                                        informed decisions.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-12 col-sm-6">
                            <div class="card text-center p-4 h-100" data-aos="zoom-in" data-aos-delay="200">
                                <img src="{{ asset('assets/images/Container.png') }}" alt=""
                                    class="img-fluid mb-2" style="width: 60px; margin: auto;">
                                <div class="card-body">
                                    <h6 class="card-title mb-2">End-to-End Support</h6>
                                    <p class="card-text medium">From search to settlement, we offer guidance and peace
                                        of mind at every
                                        step.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-12 col-sm-6">
                            <div class="card text-center p-4 h-100" data-aos="zoom-in" data-aos-delay="300">
                                <img src="{{ asset('assets/images/Container.png') }}" alt=""
                                    class="img-fluid mb-2" style="width: 60px; margin: auto;">
                                <div class="card-body">
                                    <h6 class="card-title mb-2">Tailored Solutions</h6>
                                    <p class="card-text medium">Our approach helps match properties to your lifestyle,
                                        goals, and budget.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="col-12 col-sm-6">
                            <div class="card text-center p-4 h-100" data-aos="zoom-in" data-aos-delay="400">
                                <img src="{{ asset('assets/images/Container.png') }}" alt=""
                                    class="img-fluid mb-2" style="width: 60px; margin: auto;">
                                <div class="card-body">
                                    <h6 class="card-title mb-2">Customer Focus</h6>
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


    <section id="sold" class="py-5 px-3">
        <div class="container">
            <!-- Header -->
            <div>
                <h2 class="mb-3 property text-center">Featured Properties</h2>
                <p class="Property2 text-center">
                    Explore our handpicked selection of featured properties. Each listing offers a glimpse into
                    exceptional homes
                    and investments available through Monarsh Properties. Click "View Details" for more information.
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="mt-4 text-center">
                <div class="prop d-inline-block px-3 py-2">
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                        <a id="filter-all" class="btn custom-btn" href="#">All Feature Properties</a>
                        <a id="filter-available" class="btn custom-btn" href="#">Available Properties</a>
                        <a id="filter-sold" class="btn custom-btn" href="#">Sold Properties</a>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">

                    @forelse ($properties as $property )

                     <x-card :property="$property"/>
                        
                    @empty
                        
                    @endforelse
                
                    {{-- <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                            <img src="{{ asset('assets/images/Image (41).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">Seaside Serenity Villa 1</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More</p>
                                <p id="veiw"><a class="text-decoration-none text-white"
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status sold"><i class="fas fa-crown"></i>SOLD</span>
                            <img src="{{ asset('assets/images/Image (42).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">4 Acres of Land</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More</p>
                                <p id="veiw"><a class="text-decoration-none text-white"
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                            <img src="{{ asset('assets/images/Image (43).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">Seaside Serenity Villa 4</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More.</p>
                                <p id="veiw"><a class="text-decoration-none text-white "
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status available"><i class="fas fa-crown"></i>AVAILABLE</span>
                            <img src="{{ asset('assets/images/Image (41).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">Seaside Serenity Villa 2</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More.</p>
                                <p id="veiw"><a class="text-decoration-none text-white"
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status sold"><i class="fas fa-crown"></i>SOLD</span>
                            <img src="{{ asset('assets/images/Image (42).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">4 Acres of Land</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More.</p>
                                <p id="veiw"><a class="text-decoration-none text-white"
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
                            <span class="status available"><i class="fas fa-crown"></i>
                                AVAILABLE</span>
                            <img src="{{ asset('assets/images/Image (43).png') }}" class="card-img-top"
                                alt="">
                            <div class="card-body">
                                <h5 id="seaside1" class="card-title">Seaside Serenity Villa 3</h5>
                                <p id="seaside2" class="card-text">A stunning 4-bedroom, 3-bathroom villa in a
                                    peaceful suburban
                                    neighborhood... Read More.</p>
                                <p id="veiw"><a class="text-decoration-none text-white"
                                        href="veiw-property-page.html">View Property
                                        Details</a></p>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div>
                    <p id="browse"> <a class="text-decoration-none text-white" href="property-page.html">Browse
                            All Properties</a>
                    </p>
                </div>
            </div>
    </section>


    <section class="bg-white py-5">
        <div class="container">
            <h1 class="text-center mb-5">What our client says</h1>

            <div class="row align-items-center">
                <!-- Text Content -->
                <div id="bought" class="col-12 col-md-6 mb-4 mb-md-0">
                    <h5>Bought a house in Lugbe, Abuja</h5>
                    <p>
                        Monarsh Property made owning a home in Nigeria from abroad a reality. Their transparency and
                        regular updates
                        gave me peace of mind. I felt in control, even from thousands of miles away.”
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/Profile.png') }}" alt="Profile" class="me-2"
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <div>
                                <span><strong>Chinedu A.</strong></span><br>
                                <small>London</small>
                            </div>
                        </div>
                        <p class="text-primary mb-0 mt-2 mt-sm-0">Watch Testimony »</p>
                    </div>
                </div>

                <!-- Image -->
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/images/house2.jpg') }}" alt="Testimonial House"
                        class="img-fluid rounded shadow">
                </div>
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
                        it easy and efficient. The best part? you’ll save a bunch of money and time with our services.
                    </p>
                </div>
            </div>

            <div class="container my-5">
                <div class="row align-items-stretch">
                    <!-- Buy a Property -->
                    <div class="col-12 col-md-6 mb-4 h-100">
                        <div class="buying h-100">
                            <h2>Buy a Property</h2>
                            <p id="your2">
                                We are your trusted buyer’s agent, committed to making your property purchase smooth,
                                secure, and
                                successful. With expert market knowledge, honest advice, and personalised support, we
                                work solely in
                                your interest—ensuring you find the right property at the right price, without the
                                stress.
                            </p>
                            <p id="your" class="text-white">
                                <a class="text-decoration-none text-white" href="property-page.html"> Explore
                                    Listings</a> <span><i class="bi bi-arrow-right"></i></span>
                            </p>
                        </div>
                    </div>

                    <!-- Sell a Property -->
                    <div class="col-12 col-md-6 mb-4 h-100">
                        <div class="buying2 h-100">
                            <h3>Sell a Property</h3>
                            <p id="your2">
                                Looking to sell your property and want a reliable, trustworthy partner to help you get
                                its true market
                                value? At Monarsh Property, we specialise in delivering a seamless selling
                                experience—from accurate
                                property valuation to targeted marketing and negotiation support. Reach out to us today
                                and experience
                                property selling like never before.
                            </p>
                            <p id="your" class="text-white">
                                <a class="text-decoration-none text-white" href="property-page.html">Sell Your
                                    Property</a> <span><i class="bi bi-arrow-right"></i></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Stats Section -->
            <div class="container my-4">
                <div class="row text-center">
                    <!-- Stat 1 -->
                    <div class="col-6 col-md-3 mb-4">
                        <div class="time">
                            <p class="fs-4 fw-bold mb-1"><span class="counter" data-target="7.4"
                                    data-suffix="%">0%</span></p>
                            <p class="mb-0 daily">Property Return Rate</p>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-6 col-md-3 mb-4">
                        <div class="time">
                            <p class="fs-4 fw-bold mb-1"><span class="counter" data-target="7.4"
                                    data-suffix="%">0%</span></p>
                            <p class="mb-0 daily">Property Return Rate</p>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-6 col-md-3 mb-4">
                        <div class="time">
                            <p class="fs-4 fw-bold mb-1"><span class="counter" data-target="3856">0</span></p>
                            <p class="mb-0 daily">Property in Sell & Rent</p>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="col-6 col-md-3 mb-4">
                        <div class="time2">
                            <p class="fs-4 fw-bold mb-1"><span class="counter" data-target="2540">0</span></p>
                            <p class="mb-0 daily">Daily Completed Transactions</p>
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
            <div class="row justify-content-center text-center mb-4">
                <div class="col-12 col-md-10 col-lg-8">
                    <h1>Frequently Asked Questions</h1>
                    <p>
                        Still have any questions? Contact our team via
                        <a id="support" href="contact.html"
                            class="text-decoration-none">support@MonarshProperties.com</a>
                    </p>
                </div>
            </div>

            <div class="accordion-custom">
                <!-- FAQ Item -->
                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">What services does Monarsh Property offer?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        We provide property buying, selling, investment advice, and market valuation service tailored to
                        your needs.
                    </div>
                </div>

                <!-- Repeat for each FAQ -->
                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">Can Monarsh help me buy property from abroad?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        Yes, Monarsh provides full support for international buyers, from property selection to legal
                        processing.
                    </div>
                </div>

                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">How does Monarsh determine the market value of my property?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        We use recent market data, property condition, and expert evaluations to provide accurate
                        estimates.
                    </div>
                </div>

                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">What areas do you cover?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        We cover major Nigerian cities such as Lagos, Abuja, Port Harcourt, and beyond.
                    </div>
                </div>


                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">How long does it take to sell a property with Monarsh?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        On average, it takes between 4–12 weeks depending on the location and property condition.
                    </div>
                </div>



                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">Do you offer legal support during property transactions?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        Yes, we provide legal assistance and connect clients with experienced property lawyers.
                    </div>
                </div>

                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">How can I start working with Monarsh?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
                        Just fill out our contact form, or reach out via phone or email to schedule a consultation.
                    </div>
                </div>



                <div class="faq-item border bg-white rounded-3 p-3 mb-2">
                    <div class="faq-question d-flex justify-content-between align-items-center cursor-pointer"
                        onclick="toggleFAQ(this)">
                        <p class="fw-medium mb-0">Is there a fee for your services?</p>
                        <span class="icon">+</span>
                    </div>
                    <div class="faq-answer mt-2" style="display: none;">
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
