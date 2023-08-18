@extends('layouts.applicationcontrol')

@section('content')
    <div class="bg-white w-full h-full" xmlns:livewire="http://www.w3.org/1999/html">
        <form action="{{ route('question.store', ['event' => $event]) }}" enctype="multipart/form-data" method="POST" class="flex flex-row justify-between flex-wrap w-full">
            <p class="items-center text-center w-full text-4xl font-bold text-black w-16">Create Question</p>
            @csrf
            @for($i = 1; $i <= 1;++$i)
                <section id="section" class="flex-row flex-wrap border-2 border-black rounded-md w-auto w-full h-auto m-6">
                    <label for="question{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0 mb-0 w-full">Question {{$i}}</label>
                    <textarea type="text" id="question{{$i}}" name="question{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="Your question"></textarea>


                    <section id="answerType{{$i}}" class="grid cols-span-6 w-1/6 ml-3 mb-5">
                        <!-- Dropdown menu -->
                        <label data-te-select-label-ref for='answerType{{$i}}' class="justify-start pb-1 text-xl mt-0">Answer Type</label>
                        <select data-te-select-init id='answerType{{$i}}' name="answerType{{$i}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            <option id="answerType{{$i}}"> Text </option>
                            <option id="answerType{{$i}}"> Image </option>
                        </select>
                    </section>
                </section>
            @endfor
            <section class="flex flex-row w-full m-6">
                <button type="submit" class="inline-flex items-center w-auto px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Submit
                </button>
            </section>



        </form>
    </div>
@endsection
