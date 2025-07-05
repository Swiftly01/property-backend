
<x-main-layout>
   @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/stagging.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/photography-page.css') }}">
    @endsection
    <x-slot:title>
        Photography 
    </x-slot>

    

<section id="stage" class="py-5">
  <div class="container">
    <h1 class="text-white">Monarsh Photography: Capturing Your Property’s True Essence</h1>
    <p class="expert">
      Professional property photography that showcases your home’s best angles, lighting, and unique features — designed to attract buyers and accelerate sales.
    </p>
  </div>
</section>


<section class="py-4">
  <div class="container text-center">
    <h1 class="mb-3 text-center">Where Every Shot Sells a Story</h1>
    <p class="mb-5">Monarsh Photography captures the unique charm of every space using expert techniques and high-end equipment. From cozy apartments to luxury estates, our stunning visuals help your property stand out, attract buyers, and drive engagement across all marketing platforms.
</p>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-12 col-md-4"data-aos="zoom-in">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/image (47).png') }}" class="card-img-top img-fluid" alt="Image 44">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging2-page.html">View Album</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-md-4"data-aos="zoom-in">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/Image (48).png') }}" class="card-img-top img-fluid" alt="Image 45">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging2-page.html">View Album</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-4"data-aos="zoom-in">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/image (2).png') }}" class="card-img-top img-fluid" alt="Image 46">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging2-page.html">View Album</a>
          </div>
        </div>
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


<x-stand-out/>


</x-main-layout>