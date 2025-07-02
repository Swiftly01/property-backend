<div class="mt-16 md:mt-0 flex flex-wrap justify-between items-center">
    <div class="flex items-center gap-2">
        <a href="{{ route($backRoute) }}"><img src="{{ asset('assets/icons/back-button.png') }}" alt="Go back"></a>
        <h1 class=" md:text-2xl font-bold text-gray-900 ">{{ $title }}</h1>
    </div>
    <div class="flex mt-2 sm:mt-0 gap-3 md:gap-4 items-center flex-wrap">
        {{ $slot }}
    </div>
</div>
