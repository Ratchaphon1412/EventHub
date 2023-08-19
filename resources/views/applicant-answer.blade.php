@extends('layouts.applicationcontrol')

@section('content')
    <div class="w-full">
        <div class="p-10 mx-auto flex justify-center items-center">
            <!--Card 1-->
            <div class="max-w-sm w-1/3 rounded overflow-hidden bg-white p-3 rounded-md shadow-lg">
                @if($applicant->profile_photo_path == null)
                    <img src="{{$applicant->profile_photo_url}}" alt="url picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
                @else
                    <img src="{{$applicant->getImageUrlFromPath()}}" alt="path picture avatar" class="object-cover h-full w-full bg-cover rounded-full overflow-hidden shadow" />
                @endif
                <div class="px-6 py-4 w-2/3">
                    <div class="font-bold text-2xl mb-2">
                        {{$applicant->name}}
                    </div>
                    <p class="text-gray-700 text-base">
                        {{$applicant->first_name. ' '. $applicant->last_name}}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{$applicant->email}}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{$applicant->gender}}
                    </p>
                </div>
                    <div class="w-full p-4 pt-0">
                        @if($applicant->phone != null)
                            <span class="mt-3 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        phone :{{$applicant->phone}}
                        </span>
                        @endif
                        @if($applicant->facebook != null)
                            <span class="mt-3 inline-block bg-blue-400 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                        facebook :{{$applicant->facebook}}
                        </span>
                        @endif
                        @if($applicant->instagram != null)
                            <span class="mt-3 inline-block bg-pink-400 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                        instagram :{{$applicant->instagram}}
                        </span>
                        @endif
                        @if($applicant->line != null)
                            <span class="mt-3 inline-block bg-green-400 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                        line :{{$applicant->line}}
                        </span>
                        @endif
                    </div>

            </div>
        </div>
    </div>

{{--    <div class="w-full h-full shadow-lg" xmlns:livewire="http://www.w3.org/1999/html">--}}
{{--        <form action="{{ route('question.answer.store', ['event' => $event]) }}" enctype="multipart/form-data" method="Post" class="flex flex-row justify-between flex-wrap w-full">--}}
{{--            <p class="items-center text-center w-full text-4xl font-bold text-black w-16">Applicant Answer</p>--}}
{{--            @foreach($event->questionsName as $questionsName)--}}
{{--                @if($questionsName->answer_type == 'Text')--}}
{{--                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">--}}
{{--                        <label for="answer" class="block mb-2 font-bold text-black text-2xl m-3 mr-0"> {{$questionsName->name}}</label>--}}
{{--                        @if($questionsName->where('user_id', $applicant->id)->first() != null)--}}
{{--                            <textarea type="text" id="answer" name="answer" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>{{$questionsName->where('user_id', $applicant->id)->first()}}--}}
{{--                            </textarea>--}}
{{--                        @else--}}
{{--                            <textarea type="text" id="answer" name="answer" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>Applicant does not answer--}}
{{--                            </textarea>--}}
{{--                        @endif--}}
{{--                    </section>--}}
{{--                @else--}}
{{--            @endforeach--}}
{{--            @for($i = 1; $i <= sizeof($questionsName); $i++)--}}
{{--                @if($questionsName[$i-1]->answer_type == 'text')--}}
{{--                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">--}}
{{--                        <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questionsName[$i-1]->name}}</label>--}}
{{--                        @if($questionsAnswer[$i-1] != null)--}}
{{--                            <textarea type="text" id="answer" name="answer" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>{{$questionsAnswer[$i-1]->answer}}--}}
{{--                            </textarea>--}}
{{--                        @else--}}
{{--                            <textarea type="text" id="answer" name="answer" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>Applicant does not answer--}}
{{--                            </textarea>--}}
{{--                        @endif--}}
{{--                    </section>--}}
{{--                @else--}}
{{--                    <section id="answer" class="flex flex-row justify-between flex-wrap border-2 border-black rounded-md w-full h-auto m-6">--}}
{{--                        <label for="answer{{$i}}" class="block mb-2 font-bold text-black text-2xl m-3 mr-0">{{$i}} . {{$questionsName[$i-1]->name}}</label>--}}
{{--                        @if($questionsAnswer[$i-1] != null)--}}
{{--                            <div class="h-[240px] w-[240px] m-3">--}}
{{--                                <img src="{{url('storage/images/'.$questionsAnswer[$i-1]->image_name)}}" alt="{{url('images/'.$questionsAnswer[$i-1]->image_name)}}" class="object-cover rounded-md">--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <textarea type="text" id="answer{{$i}}" name="answer{{$i}}" class="rounded-md m-3 mt-0 w-full" placeholder="" readonly>Applicant does not send image--}}
{{--                            </textarea>--}}
{{--                        @endif--}}
{{--                    </section>--}}
{{--                @endif--}}
{{--            @endfor--}}

{{--            <livewire:button-link link="{{ route('approve.register', ['event' => $event]) }}" text="Back">--}}

{{--            </livewire:button-link>--}}
{{--        </form>--}}
{{--    </div>--}}
@endsection
