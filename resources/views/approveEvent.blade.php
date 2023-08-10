@extends('layouts.applicationcontrol')

@section('content')
<section class="flex flex-col gap-6">
   <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')]">
          <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
              Approve Register
          </h1>
      
   </section>

</section>

<div class="">
    <section class="w-full flex flex-col justify-center items-center container space-y-4 mt-2">
        <div class="w-full flex flex-row justify-center">
            <h1 class="text-2xl text-black">Approve User Event</h1>
        </div>
    
        <div class="w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
          
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@windster.com
                                </p>
                            </div>
                      <dir class="flex flex-row space-x-2">
                        <x-button>
                            Reject
                        </x-button>
                        <x-button>
                            Approve
                        </x-button>
                        <x-button>
                            Answer
                        </x-button>
                        </div>
                      </dir>
                    </li>
    
                </ul>
           </div>
        </div>
    </section>
    
    <section class="w-full flex flex-col justify-center items-center container space-y-4 mt-2">
        <div class="w-full flex flex-row justify-center">
            <h1 class="text-2xl text-black">Approved User</h1>
        </div>
    
        <div class="w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
          
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@windster.com
                                </p>
                            </div>
     
                      </div>
                    </li>
    
                </ul>
           </div>
        </div>
    </section>

    <section class="w-full flex flex-col justify-center items-center container space-y-4 mt-2">
        <div class="w-full flex flex-row justify-center">
            <h1 class="text-2xl text-black">Reject User</h1>
        </div>
    
        <div class="w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
          
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@windster.com
                                </p>
                            </div>
     
                      </div>
                    </li>
    
                </ul>
           </div>
        </div>
    </section>
    
</div>

@endsection