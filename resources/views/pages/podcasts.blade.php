<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/podcast.css') }}">
    @endsection
    <x-slot:title>
        Podcasts
    </x-slot>



    <section id="podcast" class="py-4">
        <div class="container text-md-start">
            <h1 class="text-white mb-3">
                Monarsh Property Podcast: Insights, Stories & Expert Advice
            </h1>
            <p class="text-white lead">
                Stay informed with expert interviews, market trends, and tips to help you make smart property
                decisions—whether you’re buying, selling, or investing.
            </p>
        </div>
    </section>

    @php
        $podcasts = $type === \App\Enums\PropertyMediaTypeEnum::PODCAST->value ? $data : [];
    @endphp

    <section class="py-4">
      
        <div class="container py-4">
            <div class="row g-4">
                 @forelse ($podcasts as $podcast)
                

                 <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <a target="_blank" href="{{$podcast->video_url  }}">

                            <img src="{{ asset($podcast->imageUrl('thumbnail', 'thumbnail')) }}" class="card-img-top object-cover rounded-top"
                                alt="Image 3" style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">{{ $podcast->title }}</h6>
                            <p class="card-text">{{ $podcast->description }}</p>
                        </div>
                    </div>
                </div>
                     
                 @empty

                 <p>No podcasts available yet!!</p>
                     
                 @endforelse
                

                
            </div>
        </div>
    </section>








</x-main-layout>
