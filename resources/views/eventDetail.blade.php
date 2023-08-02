<x-app-layout>
    {{-- <div class="image">
            <img src="https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
            alt="Poster" class="h-auto max-w-lg rounded-lg" style="justify-items: center; margin-left: auto; margin-right: auto;">
    </div> --}}
    {{-- <div class="coverImg" >
            
    
        <div class="absolute h-full w-full overflow-hidden bg-fixed" style=" background: solid black">
            
            <img class="md:w-screen bg-center " src="https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="coverPage">
            
        </div>
    </div> --}}
    <div class="h-screen">
         <div
            class="relative overflow-hidden h-1/2  rounded-lg bg-cover bg-no-repeat p-12 md:object-scale-down bg-[url('https://images.unsplash.com/photo-1679926552705-bdac6c004dd9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80')]">
            <div
                class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed bg-gray-950/[0.6] drop-shadow-lg">
                <div class="w-full h-full md:flex justify-center items-center">
                    <div class="flex md:h-3/6 md:w-4/6 justify-start items-center bg-gray-50/[0.6] rounded-lg">
                        <div class="flex-auto h-5/6 w-fit bg-no-repeat overflow-hidden bg-cover bg-gray-50/[0.6] rounded-lg ml-10 bg-[url('https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')] ">
                            
                        {{-- <h2 class="mb-4 text-4xl font-semibold">Heading</h2>
                        <h4 class="mb-6 text-xl font-semibold">Subheading</h4>
                        <button
                            type="button"
                            class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Call to action
                        </button> --}}
                        </div>
                        <div class="md:flex-auto items-top h-5/12 w-1/12 bg-gray-50/[0.6] rounded-lg ml-10 mr-20 p-10">
                            <label class="text-2xl">A Night of Musical Magic - The Concert Spectacular! </label>
                            <h1>Category</h1>
                            <div class="flex">
                                <a href="">how many people</a>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
         </div>
            <div class="absolute h-1/2">
                <h1 class="flex justify-center items-center mt-20 text-4xl">Detail</h1>
                <p class="flex  mx-60 text-center justify-center items-center mt-10 text-2xl">Join us for an unforgettable evening of musical brilliance as we present "A Night of Musical Magic" - a concert extravaganza that promises to leave you spellbound!
                The stage is set, the lights are dimmed, and the anticipation in the air is palpable. As the audience fills the grand concert hall, whispers of excitement mingle with the gentle hum of anticipation. Tonight is no ordinary night; it is a celebration of artistry and a union of soul-stirring melodies.</p>
                <hr>
            </div>
        </div>
    </div>
    
        <div class="flex justify-center items-center  relativerounded-lg bg-cover mt-20 ">
                <img class="h-1/3 w-1/3 rounded-2xl" src="https://img.freepik.com/free-vector/blue-copy-space-digital-background_23-2148821698.jpg?w=1380&t=st=1690918132~exp=1690918732~hmac=240df9d0ac4f4dc1a7a9af1c7bad9edad19169e50f2611f46988899e4fb38cd2" alt="image description">
        </div>
        <div id="Register time" class="text-center mt-20 text-4xl">
            <label>Until Register end date</label>
            <h1 class="mt-5">Date</h1>
            <div class="grid grid-flow-col justify-center gap-5 text-center auto-cols-max mt-20">
                <div class="flex flex-wrap items-center justify-center gap-4 p-2">
                    <div class="bg-white rounded-full px-6 py-2 min-w-[120px]">
                        <div id="days" class="font-bold text-xl text-gray-800"></div>
                        <div class="text-xs uppercase text-gray-500">days</div>
                    </div>
                    <div class="bg-white rounded-full px-6 py-2 min-w-[120px]">
                        <div id="hours" class="font-bold text-xl text-gray-800"></div>
                        <div class="text-xs uppercase text-gray-500">hours</div>
                    </div>
                    <div class="bg-white rounded-full px-6 py-2 min-w-[120px]">
                        <div id="minutes" class="font-bold text-xl text-gray-800"></div>
                        <div class="text-xs uppercase text-gray-500">minutes</div>
                    </div>
                    <div class="bg-white rounded-full px-6 py-2 min-w-[120px]">
                        <div id="seconds" class="font-bold text-xl text-gray-800"></div>
                        <div class="text-xs uppercase text-gray-500">seconds</div>
                    </div>
                </div>
                <hr>
              </div>
        
        <div id="Announment time"class="mt-20 justify-center text-center text-4xl">
            <label>Announment Date</label>
            <h1 class="mt-5">Date</h1>
        </div>
        <div class="relative flex justify-center w-full h-full rounded-xl mt-20">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15495.430065221823!2d100.55934052016653!3d13.84759001989712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29d1e111be769%3A0x4332e8cd6aec8c31!2sKasetsart%20University!5e0!3m2!1sen!2sth!4v1690953595631!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="Location"class="mt-20 justify-center text-center text-4xl">
            <label>Location</label>
            <h1 class="mt-5">location detail</h1>
        </div>
        <div class="flex justify-end items-end mt-20 mr-20">
            <a href="" class="text-indigo-700 border border-indigo-600 py-4 px-6 rounded inline-flex">
                Question Page
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" class="w-6 h-6 ml-2">
                    <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
        
    
    
</x-app-layout>


