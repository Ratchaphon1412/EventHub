
<div class="flex flex-wrap sm:flex-no-wrap items-center justify-between w-full">
    <!-- first column -->
    <div class="w-full sm:w-3/12 h-64 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-white dark:bg-gray-800">
        <div  class="flex items-center justify-center focus:outline-none w-full h-full p-5">
            @if($applicant->profile_photo_path == null)
                <img src="{{$applicant->profile_photo_url}}" alt="picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
            @else
                <img src="{{$applicant->getImageUrlFromPath()}}" alt="picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
            @endif
        </div>
    </div>
    <!-- second -->
    <div class="w-full sm:w-5/12 h-64 p-16 pt-2 shadow bg-white dark:bg-gray-800">
        <div class="h-full w-auto px-6 py-2">
            <p class="w-full mt-5 mb-2 text-black font-bold text-3xl text-justify truncate">
                {{$applicant->name}}
            </p>
            <p class="w-full mt-2 mb-1 text-black font-bold text-2xl text-justify truncate">
                {{$applicant->email}}
            </p>
            <p class="w-full mt-1 text-gray-400 font-bold text-2xl text-justify truncate">
                {{$applicant->gender}}
            </p>
        </div>
    </div>
    <div class="w-full sm:w-2/12 h-64 shadow bg-white dark:bg-gray-800">
        <div class="flex items-center justify-center h-full">
            <form action="{{ route($approveRoute, ['event'=>$event, 'applicant'=> $applicant]) }}" method="POST" class="flex flex-row justify-between flex-wrap w-full">
                @csrf
                <button name="approve" type="submit" class="m-6 mt-0 inline-flex items-center px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{$button1}}</button>
            </form>
        </div>
    </div>
    <div class="w-full sm:w-2/12 h-64 rounded-b sm:rounded-b-none shadow bg-white dark:bg-gray-800">
        <div class="flex items-center justify-center h-full">
            <form action="{{ route($moreRoute, ['event'=>$event, 'applicant'=>$applicant]) }}" method="GET" class="flex flex-row justify-between flex-wrap w-full">
                <button type="submit" class="m-6 mt-0 inline-flex items-center px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{$button2}}</button>
            </form>
        </div>
    </div>
</div>
