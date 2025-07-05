
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin :: Login</title>
     @vite(['resources/css/app.css'])
</head>
 <body   style="background-image: url('/assets/images/wallpaper.jpg'); background-size: cover; background-position: center; height:100vh"> 

 <section class="">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class=" mb-6  font-semibold text-gray-900 dark:text-white">
          <img class="w-15 h-15  block mx-auto" src="{{asset('assets/icons/logo.png')}}" alt="logo">
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <p class=" text-sm text-gray-600 dark:text-gray-400">
                 Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
              </p>
                <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

              <form class="space-y-4 md:space-y-6"   method="POST" action="{{ route('password.email') }}">
                @csrf

                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                
                  <button type="submit" class="w-full text-white bg-darkest hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Email Password Reset Link</button>
                 
              </form>
          </div>
      </div>
  </div>
</section>
    
</body>
</html>
