<x-main-layout>
  @section('other_css')
  <link rel="stylesheet" href="{{ asset('assets/css/veiw-property-page.css') }}">
  @endsection
  <x-slot:title>
    Property :: Page
    </x-slot>

    <section class="py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-auto">
            <h4 class="mb-2 villa mb-md-0">
              {{ $property->title }} <span></span>
            </h4>
          </div>
          <div class="col-12 col-md-auto">
            <p id="malibu" class="mb-0">
              <span class="villa">
                <i class="bi bi-geo-alt-fill"></i>
              </span>
              {{ $property->location }}, Nigeria
            </p>
          </div>
        </div>
      </div>
    </section>

    <x-image-gallery :images="$property->getImages('other_images', 'other_images')" :thumbnail="$property->imageUrl('thumbnail', 'thumbnail')" />

    <section class="py-2">
      <div class="container">
        <div class="row g-4">

          <!-- Description Column -->
          <div class="col-12 col-md-6">
            <div class="description">
              <h3>Description</h3>
              <p class="description2">
                {{ $property->description }}
              </p>
            </div>
          </div>

          <!-- Features Column -->
          <div class="col-12 col-md-6">
            <div class="description3">
              <h3>Key Features and Amenities</h3>
              <div class="Private">
                <p><i class="bi bi-lightning-fill"></i> Expansive oceanfront terrace for outdoor
                  entertaining</p>
              </div>
              <div class="Private">
                <p><i class="bi bi-lightning-fill"></i> Gourmet kitchen with top-of-the-line appliances</p>
              </div>
              <div class="Private">
                <p><i class="bi bi-lightning-fill"></i> Private beach access for morning strolls and sunset
                  views</p>
              </div>
              <div class="Private">
                <p><i class="bi bi-lightning-fill"></i> Master suite with a spa-inspired bathroom and
                  ocean-facing balcony</p>
              </div>
              <div class="Private">
                <p><i class="bi bi-lightning-fill"></i> Private garage and ample storage space</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="side" class="py-5 bg-light">
      <div id="side" class="container">
        <div class="row g-5">

          <!-- Left Column: Description -->
          <div class="col-12 col-lg-6">
            <h1>Inquire About {{ $property->title }}</h1>
            <p>
              Interested in this property? Fill out the form below, and our real estate experts will get back
              to you
              with more details, including scheduling a viewing and answering any questions you may have.
            </p>
          </div>


          @if ($property->status === \App\Enums\PropertyStatusEnum::AVAILABLE->value)
          <!-- Right Column: Form -->
          <div class="col-12 col-lg-6">
            <form action="{{ route('buyRequest.store') }}" method="POST">
              @csrf
              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="firstname" class="form-label">First Name</label>
                  <input type="text" class="form-control input-style" id="firstname" placeholder="Enter First Name" name="firstname" value="{{ old('firstname') }}" required>
                  @error('firstname')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control input-style" id="lastname" placeholder="Enter Last Name" name="lastname" value="{{ old('lastname') }}" required>
                  @error('lastname')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                  @enderror

                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control input-style" id="email" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                  <span class="text-danger">
                    {{ $message }}

                  </span>
                  @enderror

                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="tel" class="form-control input-style" id="phone" placeholder="Enter Phone Number" name="phone_number" value="{{ old('phone_number') }}" required>
                  @error('phone_number')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3">
                <label for="property" class="form-label">Selected Property</label>
                <input class="form-control input-style" id="property" type="text" value="{{ $property->title }}" readonly>
                <input name="property_id" type="text" value="{{ $property->id }}" hidden>
              </div>

              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control input-style" id="message" rows="4" placeholder="Enter your message here...">{{ old('message') }}</textarea>
                @error('message')
                <span class="text-danger">
                  {{ $message }}

                </span>
                @enderror
              </div>
              <div class="mt-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="agreeCheck" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                  <label class="form-check-label" for="agreeCheck">
                    I agree with <a href="#" class="text-decoration-underline term">Terms of
                      Use</a> and <a href="#" class="text-decoration-underline term">Privacy
                      Policy</a>
                  </label>
                  @error('terms')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                  @enderror
                </div>

                <button type="submit" id="submit" class="mt-3 btn btn-primary mt-md-0">Submit</button>
              </div>

            </form>
          </div>
          @endif

        </div>
      </div>
    </section>





</x-main-layout>
