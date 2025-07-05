
<x-main-layout>
   @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/custom-build.css') }}">
         @vite(['resources/css/app.css'])      
    @endsection
    <x-slot:title>
        Custom :: Build
    </x-slot>


<section class="py-3 bg-light w-100">
  <div class="container px-4 px-md-5 py-4 custom bg-white">
    <div class="text-center mb-4">
      <h1 class="request">Request Custom Build</h1>
      <p class="request2">Tell us about your dream property and we'll create a custom quote for you</p>
    </div>

    <form>
      <!-- Project Overview -->
      <h5 class="mb-3"><i class="bi bi-nut-fill me-2 over"></i>Project Overview</h5>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="propertyType" class="form-label request3">Property Type</label>
          <select id="firstname" name="propertyType" class="form-select w-100">
            <option selected>Select Property type</option>
            <option>Buy</option>
            <option>Rent</option>
            <option>Sell</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="expectedType" class="form-label request3">Expected Type</label>
          <select id="firstname" name="expectedType" class="form-select w-100">
            <option selected>Select Property type</option>
            <option>Residential</option>
            <option>Commercial</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="estimatedType" class="form-label request3">Estimated Type</label>
          <select id="firstname" name="estimatedType" class="form-select w-100">
            <option selected>Select Property type</option>
            <option>Apartment</option>
            <option>Detached</option>
          </select>
        </div>
      </div>

      <!-- Project Description -->
      <div class="mb-4">
        <label for="description" class="form-label request3">Project Description *</label>
        <textarea id="firstname" name="description" class="form-control" rows="4"
          placeholder="e.g., Smart home features, Home theater, Garden..."></textarea>
      </div>

      <!-- Size, Bedrooms, Bathrooms -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="size" class="form-label request3">Size (sqft)</label>
          <select id="firstname" name="size" class="form-select w-100">
            <option selected>e.g., 1200 sqft</option>
            <option>1000 sqft</option>
            <option>1500 sqft</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="bedrooms" class="form-label request3">Bedrooms *</label>
          <input type="number" id="firstname" name="bedrooms" class="form-control w-100" placeholder="e.g., 3">
        </div>
        <div class="col-md-4">
          <label for="bathrooms" class="form-label request3">Bathrooms *</label>
          <input type="number" id="firstname" name="bathrooms" class="form-control w-100" placeholder="e.g., 2">
        </div>
      </div>

      <!-- Location -->
      <h5 class="mb-3"><i class="bi bi-geo-alt-fill me-2 over"></i>Location</h5>
      <div class="mb-4">
        <label for="location" class="form-label request3">Preferred Location</label>
        <input type="text" id="firstname" name="location" class="form-control w-100"
          placeholder="e.g., Lekki, Victoria Island, Abuja">
      </div>

      <!-- Reference Upload -->
       <div>
      <h5 class="mb-3"><i class="bi bi-calendar-check-fill me-2 over"></i>Upload Property Reference (optional)</h5>
      <div  class="mb-4">
        <x-drag-and-drop width="w-6"/>

      </div>

      <!-- Contact Info -->
      <h5 class="mb-3"><i class="bi bi-telephone-outbound-fill me-2 over"></i>Contact</h5>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="fullName" class="form-label request3">Full Name *</label>
          <input type="text" id="firstname" name="fullName" class="form-control w-100" placeholder="Enter your name">
        </div>
        <div class="col-md-4">
          <label for="phone" class="form-label request3">Phone Number *</label>
          <input type="tel" id="firstname" name="phone" class="form-control w-100" placeholder="+234 XXX XXX XXXX">
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label request3">Email Address *</label>
          <input type="email" id="firstname" name="email" class="form-control w-100" placeholder="your@email.com">
        </div>
      </div>

      <!-- Submit Button -->
      <div class="row">
        <div class="col-12">
          <button id="submit" type="submit" class="btn btn-primary w-100 mt-3"> <a class="text-decoration-none text-white" href="custom-success.html">Submit Build Request</a></button>
        </div>
      </div>
    </form>
  </div>
</section>


  


</x-main-layout>