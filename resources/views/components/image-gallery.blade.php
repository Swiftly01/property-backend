@props([
'images' => collect(),
'thumbnail' => '',
])

@php
$imageUrls = $images->map(fn($media) => is_object($media) ? $media->getUrl() : $media)->toArray();
@endphp

<div class="scroll-wrapper">
    <div class="scroll-animation">
        @forelse ($images as $media)
        @php
        $image = is_object($media) ? $media->getUrl() : $media;
        @endphp
        <img src="{{ asset($image) }}" class="img-fluid me-3" style="height: 70px;">
        @empty
        @endforelse
        @forelse ($images as $media)
        @php
        $image = is_object($media) ? $media->getUrl() : $media;
        @endphp
        <img src="{{ asset($image) }}" class="img-fluid me-3" style="height: 70px;">
        @empty
        @endforelse
    </div>
</div>



<div id="property-page" style='background-image: url({{ asset("$thumbnail") }});'
    class=" d-flex flex-column justify-content-between position-relative">

    @if(count($imageUrls) > 1)
    <div class="property">
        <i id="prevBtn" class="bi bi-arrow-left-circle-fill" style="cursor: pointer;"></i>
        <i id="nextBtn" class="bi bi-arrow-right-circle-fill" style="cursor: pointer;"></i>
    </div>
    @endif


</div>

<script>
    const imageUrls = @json($images);
</script>


<script src="{{ asset('assets/js/show.js') }}"></script>