<x-app-layout>
        <!-- Parallax Background -->
        <section class="flex flex-col w-full h-[400px] bg-cover bg-fixed bg-center  justify-center items-center " style="background-image:url({{url('storage/'.$category->category_photo_path)}})">
            <h1 class="text-white text-5xl font-black mt-20 ">
                {{$category->category_name}}

            </h1>
        </section>


            <!-- Section Product-->
        <section class="flex flex-col w-full container">
            <div class="flex flex-row justify-between m-4">
                <h1 class="font-bold text-xl text-black"> All Event in {{$category->category_name}}</h1>
               
            </div>
            @if ($events->count() > 0)
            <div class="flex flex-row justify-between flex-wrap container">
                @foreach ($events as $event)
                <a href="{{route('event.detail.show' , ['event'=>$event])}}">
                  
                    
                    <livewire:card-event-image title="{{$event->title}}"
                        image="{{url('storage/'.$event->image_poster)}}" 
                        status="Upcomming" category="{{$event->category->category_name}}" 
                        description="{{$event->description}}" 
                        location_name="{{$event->location_name}}"
                        timeEnd="{{$event->event_end_date}}"
                        timeStart="{{$event->event_start_date}}"
                       />
                </a>
                @endforeach
            </div>
            @else
            <div class="w-screen h-screen flex justify-center items-center overflow-x-hidden ">
                <h1 class="text-xl font-bold text-gray-900">Not Found Event in {{$category->category_name}}</h1>
            </div>
            @endif
            
        </section>

        <section id="coverImage" class="justify-center items-center  w-full h-[400px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat mt-8" style="background-image:url({{url('storage/assets/images/background/landing.jpg')}})" >
            <div class="flex justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
                <h1 class="text-white text-3xl font-semibold mt-20 mb-10">
                        Join us for a joyous celebration and create lasting memories together.
                </h1>
            </div>
        </section>


</x-app-layout>