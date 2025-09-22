
  <footer id="foot" class="bg-dark text-white py-4">
    <div class="container">
      <div class="row text-center text-md-start">
        <!-- Logo and Description -->
        <div class="col-12 col-md-3 mb-3 mb-md-0">
          <img src="{{ asset('assets/images/image 2.png') }}" alt="Monarsh Logo" class="mb-3 img-fluid"
            style="max-width: 150px;">
          <p class="quick2">Mornarsh Property is a trusted partner in buying, selling, and building homes. We simplify
            real estate with expert guidance, reliable service, and a commitment to your goals.</p>
        </div>

        <!-- Quick Links -->
        <div class="col-6 col-md-3 mb-4 mb-md-0">
          <h5 class="quick3">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('home') }}">Home</a></li>
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('property') }}">Properties</a></li>
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('contact') }}">Contact</a></li>
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('podcasts') }}">Podcast</a></li>
          </ul>
        </div>

        <!-- Properties -->
        <div class="col-6 col-md-3 mb-4 mb-md-0">
          <h5 class="quick3">Properties</h5>
          <ul class="list-unstyled">
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('property') }}">Land</a></li>
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('property') }}">House</a></li>

          </ul>
        </div>

        <!-- Contact -->
        <div class="col-12 col-md-3">
          <h5 class="quick3">Contact</h5>
          <ul class="list-unstyled">
            <li><a class="quick2 text-white text-decoration-none" href="{{ route('contact') }}">Contact Form</a></li>
            
          </ul>
        </div>
      </div>

      <hr class="border-secondary my-4">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <p class="foot mb-0">
            &copy; <span id="currentYear"></span> Monarsh Properties. All Rights Reserved.
            <a href="#" class="text-white text-decoration-none">Terms & Conditions</a>
          </p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <a href="https://www.facebook.com/share/16AVu4rKcM/" class="text-white me-3 quick4"><i
              class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/monarshproperty?igsh=cmk2ZTBtMHd6eHhi" class="text-white me-3 quick4"><i
              class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@MonarshProperty" class="text-white quick4"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
    </div>
  </footer>