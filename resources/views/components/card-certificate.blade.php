
<div class="flex flex-wrap sm:flex-no-wrap items-center justify-between w-full">
    <div class="flex-none w-full sm:w-1/3 h-64 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-white dark:bg-gray-800">
        <h1 class="items-center text-center font-bold text-black text-4xl mt-16 w-full">
            <!-- Month -->
            {{$dateStart}}
        </h1>
        <hr class="items-center h-1 ml-16 my-1 w-1/2 bg-gray-200 border-0 dark:bg-gray-700">
        <h1 class="items-center text-center font-semibold text-gray-400 text-4xl mt-1 w-full">
            <!-- Day -->
            {{$dateStart}}
        </h1>
    </div>

    <div class="flex-1 w-64 sm:w-1/3 h-64 shadow bg-white dark:bg-gray-800">
        <img class="bg-cover border-2 border-black h-[220px] w-[370px] m-6" src="{{$image}}" alt="Shoes"/>

    </div>
    <div class="flex-1 w-full sm:w-1/3 h-64 rounded-b sm:rounded-b-none shadow bg-white dark:bg-gray-800">
        <div class="align-left flex flex-col max-w-full m-4">
            <div class="tracking-tight leading-6 whitespace-nowrap text-black font-bold text-left text-3xl mt-2 w-[331px]">
                {{$title}}
            </div>
            <p class="tracking-tight leading-6 mt-[19px] min-h-[113px] w-[331px] text-left text-black font-bold text-xl">
                Date Event Start : {{$dateStart}} <br />
                Date Start End : {{$dateEnd}}
            </p>
            <div class="items-center items-end inline-flex gap-2 justify-center mt-7.5 overflow-hidden px-[16px] py-[20px] relative">
                <a href="{{$route}}">button</a>
                <x-button>See more</x-button>
            </div>
        </div>
    </div>
</div>

