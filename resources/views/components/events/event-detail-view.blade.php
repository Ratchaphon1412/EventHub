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
                Bitec Bang Na // Location
            </p>
        </div>
       
        <hr class="mt-5">
    </section>
    <section id="Image" class="flex flex-col justify-center items-center  first-letter w-full">
        <img src="{{url('storage/'.$event->image_poster)}}"  alt="Mountain" 
            class="w-3/4 h-full object-cover">

    </section>
    <section id="Detail">
        <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
        <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
            {{$event->description}}
        </p>
    </section>

    <section id="Location" class="flex flex-col justify-center w-full space-y-4" >
         <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Location</h1>
        <div class=" mx-20" ><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Population Estimator map</a></iframe></div>

        <section >
            <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                Join us for an unforgettable evening of musical brilliance as we present "A Night of Musical Magic" - a concert extravaganza that promises to leave you spellbound!
                The stage is set, the lights are dimmed, and the anticipation in the air is palpable. As the audience fills the grand concert hall, whispers of excitement mingle with the gentle hum of anticipation. Tonight is no ordinary night; it is a celebration of artistry and a union of soul-stirring melodies.
            </p>
        </section>

    </section>

    <section id="Contact" class="flex flex-col justify-center w-full space-y-4">
        <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Contact</h1>
        <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
            {{$event->user->name}} <br>
            {{$event->user->email}} <br>
            {{$event->user->phone}} <br>
            {{$event->user->facebook}} <br>
            {{$event->user->instagram}} <br>
            {{$event->user->line}} <br>
        </p>
    </section>
</div>