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

    <!--Carosule-->
    <section class="flex flex-col w-full container mt-8 mb-8">
        <div class="flex flex-row justify-between m-4">
                <h1 class="font-bold text-xl text-black"> Gallary </h1>
                <a href="{{route('gallery')}}" class="font-medium underline text-gray-600 hover:text-gray-900">See Gallary</a>
                
        </div>
        <div id="default-carousel" class="relative w-full  " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-40 overflow-hidden rounded-lg md:h-60">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1560523160-754a9e25c68f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1436&q=80" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1560439514-4e9645039924?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1561489401-fc2876ced162?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1472653816316-3ad6f10a6592?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTExfHxldmVudHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>


    <!-- Section Product-->
    <section class="flex flex-col w-full container">
        <div class="flex flex-row justify-between m-4">
            <h1 class="font-bold text-xl text-black"> Upcoming</h1>
  
        </div>
        <div class="flex flex-row justify-around flex-wrap">
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

