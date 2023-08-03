
<div class="flex flex-wrap sm:flex-no-wrap items-center justify-between w-full">
    <!-- first column -->
    <div class="w-full sm:w-3/12 h-64 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-white dark:bg-gray-800">
        <div class="flex items-center justify-center focus:outline-none w-full h-full p-5">
            <img src="{{$image}}" alt="man avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
        </div>
    </div>
    <!-- second -->
    <div class="w-full sm:w-5/12 h-64 p-16 pt-2 shadow bg-white dark:bg-gray-800">
        <div class="h-full w-auto px-6 py-2">
            <p class="w-full mt-5 mb-2 text-black font-bold text-3xl text-justify truncate">
                {{$name}}
            </p>
            <p class="w-full mt-2 mb-1 text-black font-bold text-2xl text-justify truncate">
                {{$email}}
            </p>
            <p class="w-full mt-1 text-gray-400 font-bold text-2xl text-justify truncate">
                {{$gender}}
            </p>
        </div>
    </div>
    <div class="w-full sm:w-2/12 h-64 shadow bg-white dark:bg-gray-800">
        <div class="flex items-center justify-center h-full">
            <x-button route="{{$approveRoute}}">
                Approve
            </x-button>
        </div>
    </div>
    <div class="w-full sm:w-2/12 h-64 rounded-b sm:rounded-b-none shadow bg-white dark:bg-gray-800">
        <div class="flex items-center justify-center h-full">
            <x-button route="{{$moreRoute}}">
                More
            </x-button>
        </div>
    </div>
</div>
