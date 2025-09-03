@props([
  "title" => "Staging"
])

<section class="bg-light py-5 stand3">
  <div class="container">
    <!-- Header Row -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5">
      <div class="mb-4 mb-md-0" style="max-width: 700px;">
        <h1 class="fw-bold stand">Why Monarsh {{ $title }} Stands Out</h1>
        <p class="stand2">
          At Monarsh Photography, we don’t just take pictures — we craft visual stories that showcase your property’s full potential. Our eye for detail, creative angles, and premium quality ensure your listings captivate and convert.
        </p>
      </div>
      <div>
        <a id="submit" href="{{ route('contact') }}" class="btn btn-primary px-4 py-2">Contact Us</a>
      </div>
    </div>

    <!-- Features Cards -->

    <div class="row text-center">
  <!-- Card 1 -->
  <div class="col-md-6 col-lg-3 mb-4" data-aos="slide-right">
    <div class="h-100 d-flex flex-column justify-content-between p-3 shadow rounded icon">
      <img src="{{ asset('assets/images') }}/Icon Container (9).png" class="img-fluid mb-2 mx-auto" alt="">
      <h6 class="text2">Precision Meets Creativity</h6>
      <p class="text">We blend technical excellence with artistic vision to capture photos that are both accurate and captivating.</p>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="col-md-6 col-lg-3 mb-4" data-aos="slide-up" data-aos-delay="100">
    <div class="h-100 d-flex flex-column justify-content-between p-3 shadow rounded">
      <img src="{{ asset('assets/images') }}/Container.png" class="img-fluid mb-2 mx-auto" alt="">
      <h6 class="every">Every Space, Perfectly Framed</h6>
      <p class="every2">From compact homes to luxury estates, we showcase each property’s best angles and architectural highlights.</p>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="col-md-6 col-lg-3 mb-4" data-aos="slide-up" data-aos-delay="200">
    <div class="h-100 d-flex flex-column justify-content-between p-3 shadow rounded icon">
      <img src="{{ asset('assets/images') }}/Icon Container (9).png" class="img-fluid mb-2 mx-auto" alt="">
      <h6 class="text2">Visuals That Drive Action</h6>
      <p class="text">Our high-quality imagery grabs attention, boosts engagement, and motivates buyers to take the next step.</p>
    </div>
  </div>

  <!-- Card 4 -->
  <div class="col-md-6 col-lg-3 mb-4" data-aos="slide-left" data-aos-delay="300">
    <div class="h-100 d-flex flex-column justify-content-between p-3 shadow rounded icon">
      <img src="{{ asset('assets/images') }}/Icon Container (9).png" class="img-fluid mb-2 mx-auto" alt="">
      <h6 class="text2">Market-Ready in Every Shot</h6>
      <p class="text">We don’t just take photos—we deliver listing-ready content tailored for web, social media, and print.</p>
    </div>
  </div>
</div>
</section>
