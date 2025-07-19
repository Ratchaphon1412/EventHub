<x-app-layout>
    <div class="bg-white w-full   mt-16" xmlns:livewire="http://www.w3.org/1999/html">
        <section id="coverImage" class="justify-center items-center  bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url('{{Storage::disk('s3')->url($event->image_poster)}}')" >
            <div class="flex flex-col justify-center items-center  bg-black rounded-lg relative p-12  h-full w-auto overflow-hidden backdrop-filter backdrop-blur-sm bg-opacity-10  bg-[url('{{Storage::disk('s3')->url($event->image_poster)}}')] ">
                <div class="grid grid-cols-1 md:grid-cols-2 backdrop-filter backdrop-blur-sm bg-opacity-80 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-3/4 drop-shadow-lg">
                    <img src="{{Storage::disk('s3')->url($event->image_poster)}}"  alt="Mountain"
                    class="w-full h-full object-cover">
                    <div id="text Title" class="flex justify-center items-center ">
                        <div id="text" class="p-6 flex-col  justify-center items-center space-y-4  gap-4">
                            <div>
                                <p class="text-base">{{$event->category->category_name}}</p>
                                <h2 class="text-3xl  font-black">{{$event->title}}</h2>
                            </div>
                            <div class="flex flex-row ">
                                <i class="bi bi-calendar-week font-bold mr-2"></i>
                                <p class=" leading-tight  text-base ">
                                    {{date('d-m-Y',strtotime($event->registration_start_date))}} - {{date('d-m-Y',strtotime($event->registration_end_date))}}
                                </p>
                            </div>
                            <div class="flex flex-row mb-4">
                                <i class="bi bi-geo-alt-fill mr-2"></i>
                                <p class="w-3/4">
                                    {{$event->location_name}}

                                </p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>


        <form action="{{ route('question.answer.store', ['event' => $event]) }}" enctype="multipart/form-data" method="Post" class="flex flex-col  justify-center items-center mt-4 ">
        <p class="items-center text-center w-full text-4xl font-bold text-black ">Answer Question</p>
        <div class="container mx-auto ">
        @csrf
        @for($i = 1; $i <= $questions_name->count(); $i++)
            @if($questions_name->get($i-1)->answer_type == 'Text')

                <section class="flex flex-col justify-center  w-full  ">
                    <div class="flex justify-start items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">{{$i}} . {{$questions_name->get($i-1)->name}}</h2>
                    </div>
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea  rows="6" type="text" id="answer{{$i}}" name="answer{{$i}}"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a answer..." required></textarea>
                    </div>
                </section>


                @else


                    <section class="flex flex-col justify-center  w-full  ">
                        <div class="flex justify-start items-center mb-6">
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">{{$i}} . {{$questions_name->get($i-1)->name}}</h2>
                        </div>
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                        <input class="m-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="image{{$i}}" type="file" name="image{{$i}}">
                    </section>

            @endif
            @endfor
        </div>


        <button type="submit" class="m-6 mt-0 inline-flex items-center px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Submit</button>
        </form>
    </div>


</x-app-layout>
