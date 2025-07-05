<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/list-property-page.css') }}">
    @endsection
    <x-slot:title>
        Property :: Listing
    </x-slot>

    <section class="py-4 bg-light w-100">
        <div class="container px-4 px-md-5 show">
            <div class="text-center mb-4">
                <h1>Sell Your Property</h1>
                <p>Fill in the details below to showcase your property to potential buyers.</p>
            </div>

            <form action="{{ route('listing.store') }}" method="POST">

                @csrf

                <!-- Property Details -->
                <h5 class="mb-3"> <span class="cont"><i class="bi bi-house-heart-fill"></i></span>Property Details</h5>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="property-type" class="form-label">Property Type</label>
                        <select id="property-type" class="form-select w-100" name="property_type" required>
                            <option>Select Property type</option>
                            @foreach (\App\Enums\PropertyTypeEnum::cases() as $case)
                                <option value="{{ $case->value }}"
                                    {{ old('property_type') == $case->value ? 'selected' : '' }}>{{ $case->label() }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('property_type')
                                {{ $message }}
                            @enderror

                        </span>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control w-100" id="description" name="description"   rows="4"
                            placeholder="Describe your property in detail..." required>{{ old('description') }}</textarea>
                        <span class="text-danger">

                            @error('description')
                                {{ $message }}
                            @enderror

                        </span>

                    </div>



                </div>

                <!-- Location -->
                <h5 class="mb-3"><span class="cont"><i class="bi bi-geo-alt-fill"></i></span>Location</h5>
                <div class="row mb-4">
                    <div class="col-12">
                        <label for="address" class="form-label">Full Address</label>
                        <input type="text" class="form-control w-100" id="address"
                            placeholder="e.g., 123 Admiralty Way, Lekki Phase 1, Lagos" name="address" value="{{ old('address') }} " required>
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror

                        </span>
                    </div>

                </div>

                <!-- Contact -->
                <h5 class="mb-3"> <span class="cont"><i class="bi bi-telephone-outbound-fill"></i></span>Contact
                </h5>
                <div class="row mb-3">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <label for="fname" class="form-label">Full Name *</label>
                        <input type="text" class="form-control w-100" id="fname" placeholder="Enter your name"
                            name="name" value="{{ old('name') }}" required>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror

                        </span>
                    </div>

                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <label for="phone-number" class="form-label">Phone Number *</label>
                        <input type="tel" class="form-control w-100" id="phone-number"
                            placeholder="+234 XXX XXX XXXX" name="phone_number" value="{{ old('phone_number') }}" required>
                        <span class="text-danger">
                            @error('phone_number')
                                {{ $message }}
                            @enderror

                        </span>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" class="form-control w-100" id="email" placeholder="your@email.com"
                            name="email" value="{{ old('email') }}" required>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror

                        </span>
                    </div>
                </div>

                <!-- Full-width Submit Button -->
                <div class="row">
                    <div class="col-12">
                        <button id="submit" type="submit" class="btn btn-primary w-100 mt-3">Submit Property</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


</x-main-layout>
