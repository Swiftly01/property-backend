 @props([
    'property'
 ])

 @php
     $status = $property->status === 'sold' ? 'sold' : 'available';
     $description = $property->description;
     $short = Str::limit($description, 100);
 @endphp

 
 <div class="col-12 col-sm-6 col-md-4 mb-4">
     <div id="seaside3" class="card h-100" data-aos="zoom-in-up">
         <span class="status {{ $status }}"><i class="fas fa-crown"></i>{{ Str::upper($status) }}</span>
         <img src="{{ asset($property->imageUrl())}}" class="card-img-top" alt="">
         <div class="card-body">
             <h5 id="seaside1" class="card-title">{{ $property->title }}</h5>
             <p id="seaside2" class="card-text main-text ">
                <span class="short-text">{{ $short }}</span>
                <span class="full-text d-none">{{ $description }}</span>
                 <span class="toggle-read cursor-pointer ml-1">Read More</span>
  
                </p>
             <p id="veiw"><a class="text-decoration-none text-white" href="veiw-property-page.html">View Property
                     Details</a></p>
         </div>
     </div>
 </div>
