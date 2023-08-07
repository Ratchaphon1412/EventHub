
<x-app-layout>
    <main class="flex-col justify-center items-center ">
        <section id="coverImage" class="justify-center items-center bg-black h-screen w-auto w-full rounded-lg">
            <div class="flex flex-col justify-center items-center min-h-screen rounded-lg relative  h-screen w-auto overflow-hidden bg-cover bg-no-repeat bg-[url('https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')]">
                <div class="flex bg-white rounded-lg shadow-lg overflow-hidden h-3/4 w-3/4 drop-shadow-lg border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Mountain" 
                    class="w-1/2 h-full object-cover">
                    <div id="text Title" class="flex justify-center items-center">
                        <div id="text" class="p-6 flex-col text-center justify-center items-center">
                            <h2 class="mt-5 text-sm md:text-base lg:text-lg xl:text-xl">Beautiful Mountain View</h2>
                            <p class="text-gray-700 leading-tight mt-5 text-sm md:text-base lg:text-lg xl:text-xl mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien porttitor, blandit velit ac,
                                vehicula elit. Nunc et ex at turpis rutrum viverra.
                            </p>
                            <p class="text-gray-700 leading-tight mt-5 text-sm md:text-base lg:text-lg xl:text-xl mb-4">
                                Date time 
                            </p>
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <section id="Detail" class="w-full text-center py-10">
            <h1 class="mt-5 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
            <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                Join us for an unforgettable evening of musical brilliance as we present "A Night of Musical Magic" - a concert extravaganza that promises to leave you spellbound!
                The stage is set, the lights are dimmed, and the anticipation in the air is palpable. As the audience fills the grand concert hall, whispers of excitement mingle with the gentle hum of anticipation. Tonight is no ordinary night; it is a celebration of artistry and a union of soul-stirring melodies.
            </p>
            <hr class="mt-5">
        </section>
        <section id="Register date time" class="flex justify-center items-center">
        <div class="grid grid-flow-col gap-5 text-center auto-cols-max">
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:15;"></span>
                </span>
                days
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:10;"></span>
                </span>
                hours
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:24;"></span>
                </span>
                min
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:54;"></span>
                </span>
                sec
            </div>
        </div>
        <hr class="mt-5">
        </section>
        <section id="announcement-date-time" class="flex flex-col justify-center items-center text-center mt-10">
            <h1 class="text-2xl md:text-4xl">Announcement Date</h1>
            <div class="p-2 bg-neutral rounded-box text-neutral-content mt-4 w-1/2 md:w-1/4">
                <p class="text-4xl md:text-5xl font-semibold">25</p>
                <p class="text-xl md:text-2xl">August</p>
            </div>
        </section> 
        <section>
            <div class="carousel w-full mt-10">
                <div id="slide1" class="flex justify-center carousel-item relative w-full ">
                <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bXVzaWN8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="w-full max-w-lg rounded-lg" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle">❮</a> 
                    <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div> 
                <div id="slide2" class="flex justify-center carousel-item relative w-full">
                    <img src="https://images.unsplash.com/photo-1510915361894-db8b60106cb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fG11c2ljfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="w-full max-w-lg rounded-lg" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide1" class="btn btn-circle">❮</a> 
                    <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div> 
                <div id="slide3" class="flex justify-center carousel-item relative w-full">
                    <img src="https://plus.unsplash.com/premium_photo-1682265683254-3b08ea75ce40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fG11c2ljfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="w-full max-w-lg rounded-lg" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a> 
                    <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div> 
                <div id="slide4" class="flex justify-center carousel-item relative w-full">
                    <img src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG11c2ljfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="w-full max-w-lg rounded-lg" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a> 
                    <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
            </div>
        </section>
    </main>  
</x-app-layout>


