<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/stagging.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/photography-page.css') }}">
    @endsection
    <x-slot:title>
        Photography
    </x-slot>

     @php
         $photographs = $type === \App\Enums\PropertyMediaTypeEnum::PHOTOGRAPHY->value ? $data : [];
     @endphp

    <section id="stage" class="py-5">
        <div class="container">
            <h1 class="text-white">Monarsh Photography: Capturing Your Property’s True Essence</h1>
            <p class="expert">
                Professional property photography that showcases your home’s best angles, lighting, and unique features
                — designed to attract buyers and accelerate sales.
            </p>
        </div>
    </section>


    <section class="py-4">
        <div class="container text-center">
            <h1 class="mb-3 text-center">Where Every Shot Sells a Story</h1>
            <p class="mb-5">Monarsh Photography captures the unique charm of every space using expert techniques and
                high-end equipment. From cozy apartments to luxury estates, our stunning visuals help your property
                stand out, attract buyers, and drive engagement across all marketing platforms.
            </p>

            <div class="row g-4">

                @forelse ($photographs  as $index => $photograph)
                    @php
                        $url = $photograph->getImages('other_images', 'other_images')[0];
                    @endphp
                    <div class="col-12 col-md-4"data-aos="zoom-in">
                        <div class="card h-100 shadow">
                            <img src="{{ asset($url) }}" class="card-img-top img-fluid" alt="{{ $photograph->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $photograph->title }}</h5>
                                <p class="card-text">{{ $photograph->description }}</p>
                                <a class="stagging" href="{{ route('photograph.details', ['photograph' => $photograph->id] ) }}">View Album</a>
                            </div>
                        </div>
                    </div>
                @empty
                 <p>No photographs available yet!!</p>
                @endforelse

            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            {{ $photographs->links() }}
        </div>
    </section>


    <x-stand-out title="Photographs" />


</x-main-layout>
