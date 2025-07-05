
<x-main-layout>
   @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/stagging.css') }}">
    @endsection
    <x-slot:title>
        Staging 
    </x-slot>

    
<section id="stage" class="py-5">
  <div class="container">
    <h1 class="text-white">Find the Best Home Staging Experts In Town</h1>
    <p class="expert">
      At Monarsh Staging, we craft inviting, stylish spaces that showcase your home’s best features and spark emotional connections with buyers. Our expert staging helps properties stand out, sell faster, and achieve greater returns.
    </p>
  </div>
</section>



<section class="py-4">
  <div class="container text-center">
    <h1 class="mb-3 text-center" data-aos="fade-up">Explore Our Portfolio of Successful Property Stagings</h1>
    <p class="mb-5" data-aos="fade-up" data-aos-delay="100">From luxury homes to smart investments, we connect you with properties and custom builds tailored to your lifestyle and goals.</p>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-12 col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/Image (44).png') }}" class="card-img-top img-fluid" alt="Image 44">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging.html">View Staging</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-md-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/Image (45).png') }}" class="card-img-top img-fluid" alt="Image 45">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging.html">View Staging</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="card h-100 shadow">
          <img src="{{ asset('assets/images/Image (46).png') }}" class="card-img-top img-fluid" alt="Image 46">
          <div class="card-body">
            <h5 class="card-title">Seaside Serenity Villa</h5>
            <p class="card-text">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... Read More</p>
            <a class="stagging" href="veiw-stagging.html">View Staging</a>
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