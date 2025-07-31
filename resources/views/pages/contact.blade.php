<x-main-layout>
    @section('other_css')
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    @endsection
    <x-slot:title>
        Contact
    </x-slot>

    <section id="contact" class="py-4">
        <div class="">
            <div class="container text-start  content">
                <h1 class="text-white">
                    Get in Touch with Monarsh Properties
                </h1>
                <p class="text-white touch2">
                    Welcome to Monarsh Properties's Contact Us page. We're here to assist you with any inquiries,
                    requests, or feedback you may have. Whether you're looking to buy or sell a property, explore
                    investment opportunities, or simply want to connect, we're just a message away. Reach out to us, and
                    let's start a conversation.
                </p>
            </div>
        </div>
    </section>


    <section class="py-4">
        <div class="container">
            <div class="row text-center gy-4 justify-content-center align-items-center">
                <h1 class="text-center mb-4">Other Ways to Connect</h1>

                <div class="col-6 col-sm-4 col-md-3">
                    <div class="connect p-3">
                        <img src="{{ asset('assets/images/Icon Container (5).png') }}" alt="Email Icon"
                            class="img-fluid mb-2" style="max-width: 50px;">
                        <p class="mb-0">info@Monarsh Properties.com</p>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3">
                    <div class="connect p-3">
                        <img src="{{ asset('assets/images/Icon Container (6).png') }}" alt="Phone Icon"
                            class="img-fluid mb-2" style="max-width: 50px;">
                        <p class="mb-0">+1 (123) 456-7890</p>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3">
                    <div class="connect p-3">
                        <img src="{{ asset('assets/images/Icon Container (7).png') }}" alt="Address Icon"
                            class="img-fluid mb-2" style="max-width: 50px;">
                        <p class="mb-0">ETORIXUSA LLC, USA</p>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3">
                    <div class="connect p-3">
                        <img src="{{ asset('assets/images/Icon Container (8).png') }}" alt="Social Media Icon"
                            class="img-fluid mb-2" style="max-width: 50px;">
                        <div class="d-flex justify-content-center gap-3 fs-4">
                            <a href="https://www.facebook.com/share/16AVu4rKcM/" class="text-dark me-3"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/monarshproperty?igsh=cmk2ZTBtMHd6eHhi"
                                class="text-dark me-3 "><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/@MonarshProperty" class="text-dark"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light w-100">
        <div class="container px-4 px-md-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Heading Section -->
                    <div class="mb-4 text-center">
                        <h1 class="mb-2">Let's Connect</h1>
                        <p class="text-muted">
                            Fill out the form below or use our live chat to connect with our team.
                            <br class="d-none d-md-block">We'll get back to you within 24 hours.
                        </p>
                    </div>

                    <!-- Form Section -->
                    <form action="{{ route('contactForm.store') }}" method="POST">
                      @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="firstname" value="{{ old('firstname') }}"
                                    class="form-control" id="first-name" placeholder="Enter First Name">
                                @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control" id="lastname" placeholder="Enter Last Name">
                                 @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"
                                    placeholder="Enter your Email">
                                     @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" name="phone_number" value="{{ old('phone_number') }}" class="form-control" id="phone"
                                    placeholder="Enter Phone Number">
                                     @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inquiry" class="form-label">Inquiry Type</label>
                                <select id="inquiry" name="inquiry_type" class="form-select">
                                    <option selected>Select inquiry type</option>
                                    @foreach (\App\Enums\InquiryEnum::cases() as $case)
                                     <option {{ old('inquiry_type') === $case->value ? 'selected' : ''}}  value="{{ $case->value }}">{{ $case->label() }}</option>
                                    @endforeach
                                </select>
                                  @error('inquiry_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="4" placeholder="Enter your message here...">{{ old('message') }}</textarea>
                              @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                        </div>

                        <div
                            class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mt-3">
                            <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" id="agreeCheck">
                                <label class="form-check-label" for="agreeCheck">
                                    I agree with <a href="#" class="text-decoration-underline term">Terms of
                                        Use</a> and <a href="#" class="text-decoration-underline term">Privacy
                                        Policy</a>
                                </label>
                                  @error('terms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary mt-3 mt-md-0"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-main-layout>
