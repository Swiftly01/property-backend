  @extends('layouts.admin')
  @section('title')
      Settings
  @endsection
  @section('content')
      <div class="p-4 sm:p-6 lg:p-10">

          <x-page-header backRoute='staging.index' title="Settings">
          </x-page-header>

          <div class="mt-5 lg:mt-10">
              <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-5 items-start">

                  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                      <div class="max-w-xl">
                          @include('profile.partials.update-profile-information-form')
                      </div>
                  </div>

                  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                      <div class="max-w-xl">
                          @include('profile.partials.delete-user-form')
                      </div>
                  </div>
              </div>
          </div>
           
           <div class="p-4 mt-8 max-w-xl sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
      </div>
      </div>
  @endsection
