 <header
        class="fixed top-0 left-0 right-0 flex items-center justify-between flex-1 w-full px-10 h-14 md:h-24 bg-darkest">
        <div class="flex items-center">
            <button onclick="toggleSidebar()" id="menuToggleBtn" class="md:hidden focus:outline-none">
                <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="block h-6 text-white cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <img class="h-10 md:h-16" src="{{ asset('assets/icons/logo.png') }}" alt="">


        </div>
        <div class="flex items-center gap-5">
            <img class="h-8" src="{{ asset('assets/icons/notification.png') }}" alt="">
            <img class="h-8" src="{{ asset('assets/icons/profile.png') }}" alt="">

        </div>

  </header>