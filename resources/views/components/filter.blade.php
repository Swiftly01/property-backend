@props([
    'values' => [],
])

<div class="dropdown dropdown-end hidden sm:block">
    <div tabindex="0" role="button" class="btn   px-4 py-2 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>
        Filter
    </div>
    <ul tabindex="0" class="dropdown-content menu bg-white rounded-md shadow-md w-52 mt-2 p-2 z-10">
        @forelse ($values as $value)
            <li><a class="hover:bg-gray-100 rounded px-2 py-1">{{ Str::ucfirst($value) }}</a></li>
        @empty
         <li class="text-gray-400 px-2 py-1">No filters available</li>
        @endforelse 


    </ul>
</div>
