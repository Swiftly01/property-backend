<x-main-layout>
  @section('other_css')
  <link rel="stylesheet" href="{{ asset('assets/css/veiw-property-page.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/veiw-staging-page.css') }}">
  @endsection
  <x-slot:title>
    Photograph Details :: Page
    </x-slot>


    <section class="py-4">
      <div class="container">
        <div class="row align-items-center">
          <!-- Villa Name -->
          <div class="col-auto">
            <h4 class="villa mb-2 mb-md-0">
              <span><i class="bi bi-arrow-left"></i></span> {{ Str::ucfirst($photograph->title) }} <span></span>
            </h4>
          </div>

          <!-- Location -->
          <div class="col-auto">
            <p id="malibu" class="mb-0">
              <span class="villa">
                <i class="bi bi-geo-alt-fill"></i>
              </span>
              {{ $photograph->location }}, Nigeria
            </p>
          </div>

          <!-- Contact Us Button -->
          <div class="col-auto ms-auto">
            <a id="submit" href="{{ route('contact') }}" class="btn btn-primary px-4 py-2">Contact Us</a>
          </div>
        </div>
      </div>
    </section>

    <x-image-gallery :images="$photograph->getImages('other_images', 'other_images')" :thumbnail="$photograph->imageUrl('thumbnail', 'thumbnail')" />


    <section class="container py-4 bg-white">
      <div class="p-4 rounded shadow-sm bg-white">
        <h3 class="mb-3 villa">{{ Str::ucfirst($photograph->title) }}</h3>
        <p class="mb-4 level">
          {{ $photograph->description }}
        </p>
        <a id="submit" href="{{ route('contact') }}" class="btn btn-primary w-100">Contact</a>
      </div>
    </section>





</x-main-layout>
