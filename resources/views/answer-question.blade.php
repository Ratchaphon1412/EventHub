@extends('layouts.applicationcontrol')

@section('content')
    <div class="bg-white w-full h-full" xmlns:livewire="http://www.w3.org/1999/html">
        <form action="{{ route('question.answer.store', ['event' => $event]) }}" enctype="multipart/form-data" method="Post" class="flex flex-row justify-between flex-wrap w-full">
        <p class="items-center text-center w-full text-4xl font-bold text-black w-16">Answer Question</p>
        @csrf
        @for($i = 1; $i <= $questions_name->count(); $i++)
            @if($questions_name->get($i-1)->answer_type == 'text')
                <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">
                    <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questions_name->get($i-1)->name}}</label>
                    <textarea type="text" id="answer{{$i}}" name="answer{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="Your answer"></textarea>
                </section>
                @else
                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">
                        <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questions_name->get($i-1)->name}}</label>
                        <input class="m-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               id="image{{$i}}" type="file" name="image{{$i}}">
                    </section>
            @endif





        @endfor
        <button type="submit" class="m-6 mt-0 inline-flex items-center px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Submit</button>
        </form>
    </div>
@endsection
