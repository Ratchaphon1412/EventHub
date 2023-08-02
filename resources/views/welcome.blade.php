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
    <section class="flex flex-col w-full h-[400px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')]">
        <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
            This is Parallax Effect
        </h1>

        <span class="text-center font-bold my-20 text-white/90">
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
        </span>
    </section>
    <!-- Section Category-->
    <section class="flex flex-col w-full container">
        <div class="flex flex-row justify-between m-4">
            <h1 class="font-bold text-xl text-black"> Category</h1>
            <x-button> Show More</x-button>
        </div>
        <div class="flex flex-row justify-around">
            
                <x-card-background-image image="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" title="Shoes!" description="If a dog chews shoes whose shoes does he choose?"/>
    
             
     
    
        </div>
    </section>
    <!-- Section Product-->
    <section class="flex flex-col w-full container">
        <div class="flex flex-row justify-between m-4">
            <h1 class="font-bold text-xl text-black"> Upcoming</h1>
            <x-button> Show More</x-button>
        </div>
        <div class="flex flex-row justify-between flex-wrap">
            <x-card-event-image title="Shoes!" image="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" status="Upcomming" category="Camp" description="If a dog chews shoes whose shoes does he choose?"/>
        </div>
    </section>
    <!-- Section Information-->
    <section class="bg-white ">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">We didn't reinvent the wheel</h2>
                <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need. Small enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.</p>
                <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple and quick.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
            </div>
        </div>
    </section>
   
    <section class="flex flex-col w-full h-[400px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')]">
        <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
            This is Parallax Effect
        </h1>

        <span class="text-center font-bold my-20 text-white/90">
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
        </span>
    </section>

</main>

       </x-app-layout>
    </body>
</html>
