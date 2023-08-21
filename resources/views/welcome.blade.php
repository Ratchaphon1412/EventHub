<x-app-layout>
    <main class="flex flex-col justify-center items-center">

    <!-- Parallax Background -->
    <section id="coverImage" class="justify-center items-center  w-full h-[400px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url({{url('storage/assets/images/background/landing.jpg')}})" >
            <div class="flex flex-col w-full h-full bg-cover bg-fixed bg-center  justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
            <h1 class="text-white text-5xl font-black mt-20 ">
            <div class="flex gap-4">
                <div class="flex gap-4 bg-black rounded-xl p-2">
                    <span class="text-white font-bold">Event</span>
                    <div class="bg-[#ffa31a] text-white h-full w-full rounded-xl ">
                        <span class="text-black">Hub</span> 
                    </div>
                    Thailand
                </div>
            </div>
            
            <!-- <span class="text-[#ffa31a] font-bold">Event</span> <span class="text-[#808080]">Hub</span> Thailand -->
        </h1>

        <span class="text-center font-bold my-10 text-white/90 container flex flex-col w-3/4">
           
            <p class="text-xl text-white">
            An event website is a dynamic online platform that curates and delivers essential information, seamless registration processes, and interactive features, fostering an engaging digital space for event 
            attendees and participants to connect, explore, and make the most of their event experience.
            </p>
        </span>
            </div>
        </section>

    <!-- Section Category-->
    <section class="flex flex-col w-full container">
        <div class="flex flex-row justify-between m-4">
            <h1 class="font-bold text-xl text-black"> Category</h1>
            
        </div>
        <div class="flex flex-row justify-around space-x-4">

            @foreach ($categories as $category)
           
            <livewire:card-background-image route="{{route('category.view',['category'=>$category])}}" image="{{url('storage/'.$category->category_photo_path)}}" title="{{$category->category_name}}" description=""/>
            @endforeach
        
    
        </div>
    </section>
    <!-- Section Product-->
    <section class="flex flex-col w-full container">
        <div class="flex flex-row justify-between m-4">
            <h1 class="font-bold text-xl text-black"> Upcoming</h1>
  
        </div>
        <div class="flex flex-row justify-between flex-wrap">
            @foreach ($events as $event)
            <a href="{{route('event.detail.show' , ['event'=>$event])}}">
                <livewire:card-event-image title="{{$event->title}}" image="{{url('storage/'.$event->image_poster)}}" status="Upcomming" category="{{$event->category->category_name}}" description="{{$event->description}}"/>
            </a>
            @endforeach
        </div>

        <div class="">
            {{$events->links()}}
        </div>
    </section>
    <!-- Section Information-->
    <section class="bg-white ">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">The website that collects the most news about the event.</h2>
                <p class="mb-4">
                    Experience seamless event management and engagement like never before with our innovative event website, where you can effortlessly access crucial information, register with ease, and connect with fellow participants to make the most of your event journey.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
            </div>
        </div>
    </section>   

        <section id="coverImage" class="justify-center items-center  w-full h-[400px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url({{url('storage/assets/images/background/landing.jpg')}})" >
            <div class="flex justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
                <h1 class="text-white text-3xl font-semibold mt-20 mb-10">
                        Join us for a joyous celebration and create lasting memories together.
                </h1>
            </div>
        </section>
                </section>
            </main>
</x-app-layout>

