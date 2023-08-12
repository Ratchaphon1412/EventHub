@extends('layouts.applicationcontrol')

@section('content')
    <div class="w-full">
        <div class="p-10 mx-auto flex justify-center items-center">
            <!--Card 1-->
            <div class="max-w-sm rounded overflow-hidden">
                @if($applicant->profile_photo_path == null)
                    <img src="{{$applicant->profile_photo_url}}" alt="picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
                @else
                    <img src="{{$applicant->profile_photo_path}}" alt="picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
                @endif
                <div class="px-6 py-4 shadow-lg">
                    <div class="font-bold text-2xl mb-2">{{$applicant->name}}</div>
                    <p class="text-gray-700 text-base">
                        {{$applicant->email}}
                    </p>
                    <span class="mt-3 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        {{$applicant->gender}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-full shadow-lg" xmlns:livewire="http://www.w3.org/1999/html">
        <form action="{{ route('question.answer.store', ['event' => $event]) }}" enctype="multipart/form-data" method="Post" class="flex flex-row justify-between flex-wrap w-full">
            <p class="items-center text-center w-full text-4xl font-bold text-black w-16">Applicant Answer</p>
            @for($i = 1; $i <= sizeof($questionsName); $i++)
                @if($questionsName[$i-1]->answer_type == 'text')
                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">
                        <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questionsName[$i-1]->name}}</label>
                        @if($questionsAnswer[$i-1] != null)
                            <textarea type="text" id="answer{{$i}}" name="answer{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>{{$questionsAnswer[$i-1]->answer}}
                            </textarea>
                        @else
                            <textarea type="text" id="answer{{$i}}" name="answer{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>Applicant does not answer
                            </textarea>
                        @endif
                    </section>
                @else
                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">
                        <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questionsName[$i-1]->name}}</label>
                        @if($questionsAnswer[$i-1] != null)
                            <div class="h-[240px] w-[240px]">
                                <img src="{{asset('public/images').'/'.$questionsAnswer[$i-1]->image}}" alt="" class="object-cover">
                            </div>
                        @else
                            <textarea type="text" id="answer{{$i}}" name="answer{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>Applicant does not send image
                            </textarea>
                        @endif
                    </section>
                @endif
            @endfor

            <livewire:button-link link="{{ route('approve.register', ['event' => $event]) }}" text="Back">

            </livewire:button-link>
        </form>
    </div>
@endsection
