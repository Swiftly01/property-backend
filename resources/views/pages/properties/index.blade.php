<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/property-page.css') }}">
    @endsection
    <x-slot:title>
        Property :: Page
    </x-slot>


    <section id="back" class="">
        <div class="container text-md-start py-5">
            <h1 class="mb-3 text-white ">Find Your Dream Property</h1>
            <p class="back3">
                Welcome to Monarsh Properties, where your dream property awaits in every corner of our beautiful world.
                Explore our curated selection of properties, each offering a unique story and a chance to redefine your
                life. With categories to suit every dreamer, your journey
            </p>
        </div>

    <form action="{{ route('property') }}" method="GET">
        <div class="pb-5 search-wrapper2 container mt-auto position-relative">
            <div class="find d-flex flex-column flex-md-row justify-content-between align-items-center mb-0">
                <p class="find3 mb-2 mb-md-0">Search For a Property</p>
                
                <button type="submit" class="find-btn"><i class="bi bi-search"></i> Find Property</button>
            </div>
       
                <div class="row g-0 px-3 search-wrapper">

                    <!-- Location -->
                    <div class="col-12 col-md-4 p-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-geo-alt"></i></span>
                            <select id="location-select" class="form-select form-select-sm locate"
                                aria-label="Select Location" name="location">
                                <option disabled selected>Select Location</option>
                                @foreach (\App\Enums\LocationEnum::cases() as $case)
                                    <option value="{{ $case->value }}"
                                        {{ old($case->value) === 'selected' ? 'selected' : '' }}>{{ $case->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Property Type -->
                    <div class="col-12 col-md-4 p-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-house-heart-fill"></i></span>
                            <select id="property-type-select" class="form-select form-select-sm locate"
                                aria-label="Select Property Type" name="property_type">
                                <option disabled selected>Select Property Type</option>
                                @foreach (\App\Enums\PropertyTypeEnum::cases() as $case)
                                    <option value="{{ $case->value }}"
                                        {{ old($case->value) === 'selected' ? 'selected' : '' }}>{{ $case->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- Property Status -->
                    <div class="col-12 col-md-4 p-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-box"></i></span>
                            <select id="property-status-select" class="form-select form-select-sm locate"
                                aria-label="Select Property Status" name="status">
                                <option disabled selected>Select Property Status</option>
                                @foreach (\App\Enums\PropertyStatusEnum::cases() as $case)
                                    <option value="{{ $case->value }}"
                                        {{ old($case->value) === 'selected' ? 'selected' : '' }}>{{ $case->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


         </div>

      </form>

          

    </section>


    <section>
        <div class="container mt-5">
            <div class="row">

                @forelse ($properties as $property)
                    <x-card :property="$property" />
                @empty
                @endforelse

    </section>


    <section class="py-4">
        <div class="container">
            {{ $properties->links() }}

        </div>
    </section>

    <x-news-letter />

    <script src="{{ asset('assets/js/filter.js') }}"></script>

</x-main-layout>
