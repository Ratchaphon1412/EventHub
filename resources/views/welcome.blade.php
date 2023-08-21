<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body >
       <x-app-layout>
    <main class="flex flex-col justify-center items-center">

    <!-- Parallax Background -->
    <section class="flex flex-col w-full h-[400px] bg-cover bg-fixed bg-center  justify-center items-center " style="background-image:url({{url('storage/assets/images/background/landing.jpg')}})">
        <h1 class="text-white text-5xl font-black mt-20 ">
            <span class="text-gray-800 font-bold">Event</span> <span class="text-yellow-400">Hub</span> Thailand
        </h1>

        <span class="text-center font-bold my-10 text-white/90 container flex flex-col w-3/4">
           
            <p class="text-xl text-slate-950">
            An event website is a dynamic online platform that curates and delivers essential information, seamless registration processes, and interactive features, fostering an engaging digital space for event 
            attendees and participants to connect, explore, and make the most of their event experience.
            </p>
        </span>
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
    <section class="flex flex-col w-full h-[400px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1479707341578-d3f239e493d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')]">
        <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
            Join us for a joyous celebration and create lasting memories together.
        </h1>

        <!-- <span class="text-center font-bold my-20 text-white/90">
            <a
                href="https://egoistdeveloper.github.io/twcss-to-sass-playground/"
                target="_blank"
                class="text-white/90 hover:text-white">
                Convetert to SASS
            </a>

            <hr class="my-4" />

            <a
                href="https://unsplash.com/photos/8Pm_A-OHJGg"
                target="_blank"
                class="text-white/90 hover:text-white">
                Image Source
            </a>

            <hr class="my-4" />

            <p>
                <a
                    href="https://github.com/EgoistDeveloper/my-tailwind-components/blob/main/src/templates/parallax-landing-page.html"
                    target="_blank"
                    class="text-white/90 hover:text-white">
                    Source Code
                </a>
                |
                <a
                    href="https://egoistdeveloper.github.io/my-tailwind-components/./src/templates/parallax-landing-page.html"
                    target="_blank"
                    class="text-white/90 hover:text-white">
                    Full Preview
                </a>
            </p>
        </span> -->
        
        </section>
</main>
       </x-app-layout>
    </body>
</html>
