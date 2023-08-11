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
                    <livewire:card-event-image title="{{$event->title}}" image="{{url('storage/'.$event->image_poster)}}" status="Upcomming" category="{{$event->category->category_name}}" description="{{$event->description}}"/>
                </a>
                @endforeach
            </div>
            @else
            <div class="w-screen h-screen flex justify-center items-center overflow-x-hidden ">
                <h1 class="text-xl font-bold text-gray-900">Not Found Event in {{$category->category_name}}</h1>
            </div>
            @endif
            
        </section>


</x-app-layout>