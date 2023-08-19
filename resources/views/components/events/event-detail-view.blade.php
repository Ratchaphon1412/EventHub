<div>
    <section id="Title" class="w-full text-center py-10 space-y-4">
        <h1 class="mt-5 text-2xl md:text-4xl lg:text-5xl">{{$event->title}}</h1>
        <div class="flex flex-row justify-center">
            <i class="bi bi-calendar-week font-bold mr-2"></i>
            <p class=" leading-tight  text-base ">
            {{date('d-m-Y',strtotime($event->registration_start_date))}} - {{date('d-m-Y',strtotime($event->registration_end_date))}}
            </p>
        </div>
        <div class="flex flex-row  justify-center">
            <i class="bi bi-geo-alt-fill mr-2"></i>
            <p>
                {{$event->location_name}}
            </p>
        </div>
       
        <hr class="mt-5">
    </section>
    <section id="Image" class="flex flex-col justify-center items-center  first-letter w-full">
        <img src="{{url('storage/'.$event->image_poster)}}"  alt="Mountain" 
            class="w-1/2 h-1/2 object-cover">

    </section>
    <section id="Detail">
        <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
        <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
            {{$event->description}}
        </p>
    </section>

    <section class="flex flex-col justify-center items-center gap-4  mt-4">
        @foreach ( $event->eventImage as $image)
            <img src="{{url('storage/'.$image->event_image)}}" class="w-3/4 h-full object-cover" alt="">
        @endforeach
    </section>

    <section id="Location" class="flex flex-col justify-center w-full space-y-4" >
         <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Location</h1>
        <div class=" mx-20" >
            <iframe
            class="w-full h-80"
            frameborder="0" style="border:0"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_API') }}&q={{$event->event_latitude}},{{$event->event_longitude}}&zoom=12&maptype=roadmap"
            allowfullscreen>
          </iframe>
        </div>

        <section >
            <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                {{$event->location_detail}}
            </p>
        </section>

    </section>

    @if($event->contact)
    <section id="Contact" class="flex flex-col justify-center w-full space-y-4">
        <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Contact</h1>
        <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
            {{$event->contact}}
        </p>
    </section>

    @endif
</div>