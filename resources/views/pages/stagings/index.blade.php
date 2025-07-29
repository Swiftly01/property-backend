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
                At Monarsh Staging, we craft inviting, stylish spaces that showcase your home’s best features and spark
                emotional connections with buyers. Our expert staging helps properties stand out, sell faster, and
                achieve greater returns.
            </p>
        </div>
    </section>

    @php
        $stagings = $type === \App\Enums\PropertyMediaTypeEnum::STAGING->value ? $data : [];
    @endphp

    <section class="py-4">
        <div class="container text-center">
            <h1 class="mb-3 text-center" data-aos="fade-up">Explore Our Portfolio of Successful Property Stagings</h1>
            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">From luxury homes to smart investments, we connect
                you with properties and custom builds tailored to your lifestyle and goals.</p>

            
            <div class="row g-4">

                @forelse ($stagings  as $index => $staging)
                    @php
                        $url = $staging->getImages('other_images', 'other_images')[0];
                    @endphp
                    <div class="col-12 col-md-4"data-aos="zoom-in">
                        <div class="card h-100 shadow">
                            <img src="{{ asset($url) }}" class="card-img-top img-fluid" alt="{{ $staging->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $staging->title }}</h5>
                                <p class="card-text">{{ $staging->description }}</p>
                                <a class="stagging" href="{{ route('staging.details', ['staging' => $staging->id] ) }}">View Album</a>
                            </div>
                        </div>
                    </div>
                @empty
                 <p>No stagings available yet!!</p>
                @endforelse

            </div>
        </div>
    </section>


    <section class="py-4">
        <div class="container">
            {{ $stagings->links() }}
        </div>
    </section>


    <x-stand-out />


</x-main-layout>
