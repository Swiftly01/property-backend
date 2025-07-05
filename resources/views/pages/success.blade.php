
<x-main-layout>
   @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/success-page.css') }}">
         
    @endsection
    <x-slot:title>
        Success
    </x-slot>

<section class="py-5">
  <div class="container">
    <div class="text-center">
      <img src="{{ asset('assets/images/image 55.png') }}" class="img-fluid mb-4" style="max-width: 200px; height: auto;" alt="Centered Image">
      <h1 class="submit2">Property Submitted Successfully</h1>
      <p class="submit3">Your property listing has been successfully submitted and is now under review.<br>
      Our team will reach out to you within 24 hours.</p>
      <a href="{{ route('home') }}" id="submit" class="btn btn-primary mt-3">Back to Home Page</a>
    </div>
  </div>
</section>


  


</x-main-layout>