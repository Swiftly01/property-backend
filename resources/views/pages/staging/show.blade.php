
<x-main-layout>
   @section('other_css')
           <link rel="stylesheet" href="{{ asset('assets/css/veiw-staging.css') }}">
    @endsection
    <x-slot:title>
        Staging :: Details
    </x-slot>

    
<section class="py-4">
  <div class="container">
    <div class="row align-items-center">
      <!-- Villa Name -->
      <div class="col-auto">
        <h4 class="villa mb-2 mb-md-0">
         <span><i class="bi bi-arrow-left"></i></span> Seaside Serenity Villa <span></span>
        </h4>
      </div>

      <!-- Location -->
      <div class="col-auto">
        <p id="malibu" class="mb-0">
          <span class="villa">
            <i class="bi bi-geo-alt-fill"></i>
          </span>
          Malibu, California
        </p>
      </div>

      <!-- Contact Us Button -->
      <div class="col-auto ms-auto">
        <a id="submit" href="contact.html" class="btn btn-primary px-4 py-2">Contact Us</a>
      </div>
    </div>
  </div>
</section>


<section id="animate" class="py-4 overflow-hidden container">
  <div class="container">
    <div class="scroll-animation">
      <img src="{{ asset('assets/images/imgA.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGB.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGC.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGE.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGF.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGG.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGH.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGI.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGJ.png') }}" class="img-fluid me-3" style="height: 70px;">
     
      <img src="{{ asset('assets/images/imgA.png') }}" class="img-fluid me-3" style="height: 70px;">
      <img src="{{ asset('assets/images/IMGB.png') }}" class="img-fluid me-3" style="height: 70px;">
    </div>
  </div>

  <div id="property-page" class="container d-flex flex-column justify-content-between position-relative" style="min-height: 300px;">
 
    <div class="d-flex justify-content-between">
    <div class="arrow d-flex flex-column align-items-center">
      <i class="bi bi-play-circle-fill text-dark fs-5"></i>
      <a id="false" class="text-decoration-none text-dark " href="#">Watch video</a>
    </div>

<div class="arrow2">
  <i id="prevBtn" class="bi bi-arrow-left-circle-fill point fs-2" style="cursor: pointer;"></i>
  <i id="nextBtn" class="bi bi-arrow-right-circle-fill point fs-2" style="cursor: pointer;"></i>
  
</div>
</div>
</section>


<section class="container py-4 bg-white">
  <div class="p-4 rounded shadow-sm bg-white">
    <h3 class="mb-3 villa">Seaside Serenity Villa</h3>
    <p class="mb-4 level">
      This stunning multi-level development is a perfect blend of modern architecture, premium materials, and functional design.
      The building offers spacious residential units with open-plan layouts, large windows for natural lighting, and high-quality finishes throughout.
      Amenities include a fully equipped gym, rooftop lounge with scenic views, elevator access, ample parking, and 24/7 security with CCTV surveillance.
      Designed for both comfort and efficiency, it also features smart home infrastructure, solar power integration, and energy-saving fixtures.
      Ideally located in a well-connected area, this property is perfect for families, professionals, or investors seeking a premium living experience or high-yield asset.
    </p>
    <a id="submit" href="contact.html" class="btn btn-primary w-100">Contact</a>
  </div>
</section>



</x-main-layout>