
<x-app-layout>
    
    <main class="flex-col justify-center items-center ">
        <section id="coverImage" class="justify-center items-center bg-black h-screen w-auto w-full rounded-lg">
            <div class="flex flex-col justify-center items-center min-h-screen rounded-lg relative  h-screen w-auto overflow-hidden bg-cover bg-no-repeat bg-[url('$event->image_poster')]">
                <div class="flex bg-white rounded-lg shadow-lg overflow-hidden h-3/4 w-3/4 drop-shadow-lg border-4 border-white">
                    <img src="{{$event->image_poster}}" alt="Mountain" 
                    class="w-1/2 h-full object-cover">
                    <div id="text Title" class="flex justify-center items-center">
                        <div id="text" class="p-6 flex-col text-center justify-center items-center">
                            <h2 class="mt-5 text-sm md:lg lg:text-xl xl:text-4xl mb-4">{{$event->title}}</h2>
                            <p class="text-gray-700 leading-tight mt-5 text-sm md:lg lg:text-xl xl:text-2xl mb-4">
                                
                            </p>
                            <p class="text-gray-700 leading-tight mt-5 text-sm md:lg lg:text-xl xl:text-2xl mb-4">
                                {{date('d-m-Y',strtotime($event->event_start_date))}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <section id="Detail" class="w-full text-center py-10">
            <h1 class="mt-5 text-2xl md:text-4xl lg:text-5xl">Detail</h1>
            <p class="mt-5 mx-20 text-sm md:text-base lg:text-lg xl:text-xl">
                {{$event->description}}
            </p>
            <hr class="mt-5">
        </section>
        <section id="Register date time" class="flex justify-center items-center">
        <div id="test" class="card-header text-white text-center bg-successwdd">

        </div>
        <div class="grid grid-flow-col gap-5 text-center auto-cols-max">
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:{{(int)date('d',strtotime($event->event_start_date))}}"></span>
                </span>
                days
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:{{(int)date('h',strtotime($event->event_start_date))}}"></span>
                </span>
                hours
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:{{(int)date('i',strtotime($event->event_start_date))}};"></span>
                </span>
                min
            </div> 
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="countdown font-mono text-5xl">
                <span style="--value:{{(int)date('s',strtotime($event->event_start_date))}};"></span>
                </span>
                sec
            </div>
        </div>
        <hr class="mt-5">
        </section>
        <section id="announcement-date-time" class="flex flex-col justify-center items-center text-center mt-10">
            <h1 class="text-2xl md:text-4xl">Announcement Date</h1>
            <div class="p-2 bg-neutral rounded-box text-neutral-content mt-4 w-1/2 md:w-1/4">
                <p class="text-4xl md:text-5xl font-semibold">{{date('d',strtotime($event->event_start_date))}}</p>
                <p class="text-xl md:text-2xl">{{date('F',strtotime($event->event_start_date))}}</p>
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
        <section id="container map" class ="relative flex-col rounded-xl mt-10">
           <label class="flex text-sm md:lg lg:text-xl xl:text-4xl xl-60 w-full text-center justify-center">Location Map</label>
            <div class="relative flex justify-center  rounded-xl p-10">
                <div id="map" class="border-0 w-3/4 h-450">

                </div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15495.430065221823!2d100.55934052016653!3d13.84759001989712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29d1e111be769%3A0x4332e8cd6aec8c31!2sKasetsart%20University!5e0!3m2!1sen!2sth!4v1690953595631!5m2!1sen!2sth" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
            <!-- Google Map -->
            <script
                    
                type="text/javascript" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15495.430065221823!2d100.55934052016653!3d13.84759001989712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29d1e111be769%3A0x4332e8cd6aec8c31!2sKasetsart%20University!5e0!3m2!1sen!2sth!4v1690953595631!5m2!1sen!2sth">

                function showMap(lat,long)
                {
                    var coord = {lat:lat, lng:long}

                    new google.maps.Map(
                        document.getElementById("map"),{
                            zoom:10,
                            center: coord
                        }
                    );
                }
                showMap($event->event_longitude,$event->event_longitude);
            </script>
        </section> 
    </main>
    
</x-app-layout>


