
<section class="main bg-dark text-white py-2">
  <p class="main1 text-center mb-2">
    ✨ Discover Your Dream Property with Monarsh Properties 
    <a class="main2 ms-2" href="#">Learn More</a>
  </p>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      
      <!-- Logo on the left with left margin -->
      <a id="custom-logo-margin" class="navbar-brand ms-5" href="{{ route('home') }}">
        <img src="{{ asset('assets/images/image 2.png') }}" alt="Monarsh Logo" width="80" height="65">
      </a>

      <!-- Mobile toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Nav links and buttons -->
      <div class="collapse navbar-collapse" id="navbarText">

        <!-- Center nav links -->
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 logo2 ">
          <li class="nav-item">
            <a id="home" class="nav-link active text-white" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a id="home" class="nav-link text-white" href="{{ route('property') }}">Properties</a>
          </li> 
          <li id="home" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('staging') }}">Staging</a></li>
              <li><a class="dropdown-item" href="{{ route('photographs') }}">Photography</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a id="home" class="nav-link text-white" href="{{ route('podcasts') }}">Podcast</a>
          </li>
          <li class="nav-item">
            <a id="home" class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>

        <!-- Buttons on the right with right margin -->
        <div class="d-flex gap-2 me-5">
          <a href="{{ route('sellRequest.create') }}" class="sell" >Sell</a>
          <a href="{{ route('property') }}" class="buy">Buy</a>
        </div>
      </div>
    </div>
  </nav>
</section>