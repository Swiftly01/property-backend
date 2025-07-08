@php
    $menuItems = [
        ['label' => 'Dashboard', 'icon' => 'dashboard.png', 'route' => 'dashboard', 'sub_route' => 'dashboard.*'],
        ['label' => 'Staffs', 'icon' => 'staff.svg', 'route' => 'test', 'sub_route' => 'index.*'],
        [
            'label' => 'Properties',
            'icon' => 'property.svg',
            'route' => 'properties.index',
            'sub_route' => 'properties.*',
        ],
        [
            'label' => 'Buy request',
            'icon' => 'buy-request.svg',
            'route' => 'buy-requests.index',
            'sub_route' => 'buy-requests.*',
        ],
        [
            'label' => 'Sell request',
            'icon' => 'sell-request.svg',
            'route' => 'sell-requests.index',
            'sub_route' => 'sell-requests.*',
        ],
        [
            'label' => 'Photograph',
            'icon' => 'photograph.svg',
            'route' => 'photographs.index',
            'sub_route' => 'photographs.*',
        ],
        ['label' => 'Staging', 'icon' => 'staging.svg', 'route' => 'staging.index', 'sub_route' => 'staging.*'],
        ['label' => 'Podcast', 'icon' => 'podcast.svg', 'route' => 'podcasts.index', 'sub_route' => 'podcasts.*'],
        ['label' => 'Contact', 'icon' => 'contact.svg', 'route' => 'contacts.index', 'sub_route' => 'contacts.*'],
        ['label' => 'Settings', 'icon' => 'settings.png', 'route' => 'settings', 'sub_route' => 'settings.*'],
    ];
@endphp



<nav id="sideNav"
    class="fixed bottom-0 left-0 z-50 duration-300 ease-in-out transform -translate-x-full border-t-2 border-white  transition-transform md:translate-x-0 bg-darkest w-60 md:top-24 md:block top-14 flex flex-col h-full">
    <div class="flex justify-between pt-2">
        <p class="text-white mx-5">Menu</p>
        <svg id="closeIcon" onclick="toggleSidebar()" class="hidden w-6 h-6 text-white mr-4 cursor-pointer"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>

    </div>

    <ul>
        @foreach ($menuItems as $index => $item)
            <li><a class="flex items-center gap-2 px-3 py-3 mx-5 my-2 text-brown font-medium  hover:bg-primary hover:rounded-md hover:text-white   {{ Route::is($item['sub_route']) || Route::is($item['route']) ? 'bg-primary rounded-md text-white' : '' }}"
                    href="{{ route($item['route']) }}"> <img src="{{ asset('assets/icons/' . $item['icon']) }}"
                        alt="dashboard">
                    <span>{{ $item['label'] }}</span> <span
                        class="bg-[#00A8FF] text-white  px-1 ml-5 text-sm rounded-sm">{{ $item['route'] === 'buy-requests.index' ? '08' : '' }}</span></a>
            </li>
        @endforeach
    </ul>

    <div class="mx-5 border-t border-brown">
        <p class="text-brown py-2">Profile</p>
        <div class="flex gap-2 items-center">
            <img class="h-8" src="{{ asset('assets/icons/profile.png') }}" alt="">
            <div class="">
                <h3 class="text-white font-medium">Adeniji johnson</h3>
                <p class="text-brown text-sm break-all font-thin">Adejohnson@gmail.com</p>
            </div>

        </div>



        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="" onclick="event.preventDefault();  this.closest('form').submit()"
                class="flex text-white text-sm gap-1 items-center bg-danger justify-center p-2 rounded-md my-2 hove:bg-red-700 hover:shadow-md hover:scale-[1.02] transition-duration-200 active:scale-95"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>Log out</a>
        </form>

    </div>

</nav>
