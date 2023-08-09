@extends('layouts.applicationcontrol')

@section('content')
<section class="flex flex-col gap-6">
   <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')]">
          <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
              Approve Register
          </h1>
          {{-- <span class="text-center font-bold my-20 text-white/90">
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
          </span> --}}
   </section>
   <section id="Applicants" class="flex flex-col w-full h-[600px] rounded-xl bg-cover bg-fixed bg-center  bg-slate-400">
       <div>
            <h1 class="md:text-2xl p-4">Applicants</h1>
            <div id="list">
                <x-list-card>

                </x-list-card>
            </div>
       </div>
   </section>
   <section id="Applicants" class="flex flex-col w-full h-[600px] rounded-xl bg-slate-400">
        <div id="lock จอเลื่อนขึ้นเลื่อนลง">
            <h1 class="md:text-2xl p-4">Approve</h1>
            <ul id="list" class="flex justify-center items-center">
                <x-list-card>
                    
                </x-list-card>
            </ul>
        </div>
   </section>
</section>
@endsection