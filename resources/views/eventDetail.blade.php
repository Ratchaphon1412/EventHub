
<x-app-layout>
    
    <main class="flex-col justify-center items-center ">
       
        <section id="coverImage" class="justify-center items-center  bg-fixed bg-black   w-full  rounded-lg  bg-cover bg-no-repeat bg-[url('https://images.unsplash.com/photo-1501560379-05951a742668?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')]">
            <div class="flex flex-col justify-center items-center  rounded-lg relative p-12  h-full w-auto overflow-hidden backdrop-filter backdrop-blur-sm bg-opacity-10  ">
                <div class="grid grid-cols-1 md:grid-cols-2 backdrop-filter backdrop-blur-sm bg-opacity-80 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-3/4 drop-shadow-lg">
                    <img src="https://images.unsplash.com/photo-1501560379-05951a742668?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"  alt="Mountain" 
                    class="w-full h-full object-cover">
                    <div id="text Title" class="flex justify-center items-center">
                        <div id="text" class="p-6 flex-col text-start justify-center items-center space-y-4  gap-4">
                            <div>
                                <p class="text-base">Category</p>
                                <h2 class="text-3xl  font-black">Beautiful Mountain View</h2>
                            </div>
                            <div class="flex flex-row ">
                                <i class="bi bi-calendar-week font-bold mr-2"></i>
                                <p class=" leading-tight  text-base ">
                                    
                                29 Sep 2023 17:00 - 30 Sep 2023 17:00
                                </p>
                            </div>
                            <div class="flex flex-row">
                                <i class="bi bi-geo-alt-fill mr-2"></i>
                                <p>
                                    Bitec Bang Na
                                </p>
                            </div>
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium  focus:outline-none text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Join</button>

                            
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <div class="container mx-auto">
            <div class="mb-4 border-b border-gray-200 sticky top-12 bg-white z-10">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" >
                    <li class="mr-2" role="presentation">
                        <a href="#Detail" class="inline-block p-4 border-b-2 rounded-t-lg"  type="button" >Detail</a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="#Image" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg" type="button">Image</a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="#Location" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg" type="button" >Location</a>
                    </li>
                    <li role="presentation">
                        <a href="#Contact" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg "   type="button">Contacts</a>
                    </li>
                </ul>
            </div>
    
            <section id="Title" class="w-full text-center py-10 space-y-4">
                <h1 class="mt-5 text-2xl md:text-4xl lg:text-5xl">Beautiful Mountain View</h1>
                <div class="flex flex-row justify-center">
                    <i class="bi bi-calendar-week font-bold mr-2"></i>
                    <p class=" leading-tight  text-base ">
                        
                    29 Sep 2023 17:00 - 30 Sep 2023 17:00
                    </p>
                </div>
                <div class="flex flex-row  justify-center">
                    <i class="bi bi-geo-alt-fill mr-2"></i>
                    <p>
                        Bitec Bang Na
                    </p>
                </div>
               
                <hr class="mt-5">
            </section>
            <section id="Image" class="flex flex-col justify-center items-center  first-letter w-full">
                <img src="https://images.unsplash.com/photo-1501560379-05951a742668?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"  alt="Mountain" 
                    class="w-3/4 h-full object-cover">

            </section>
            <section id="Detail">
                <h1 class="mt-5 mx-20 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
                <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                    Join us for an unforgettable evening of musical brilliance as we present "A Night of Musical Magic" - a concert extravaganza that promises to leave you spellbound!
                    The stage is set, the lights are dimmed, and the anticipation in the air is palpable. As the audience fills the grand concert hall, whispers of excitement mingle with the gentle hum of anticipation. Tonight is no ordinary night; it is a celebration of artistry and a union of soul-stirring melodies.
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
                    Join us for an unforgettable evening of musical brilliance as we present "A Night of Musical Magic" - a concert extravaganza that promises to leave you spellbound!
                    The stage is set, the lights are dimmed, and the anticipation in the air is palpable. As the audience fills the grand concert hall, whispers of excitement mingle with the gentle hum of anticipation. Tonight is no ordinary night; it is a celebration of artistry and a union of soul-stirring melodies.
                </p>
            </section>


     
        </div>
    </main>  
</x-app-layout>


