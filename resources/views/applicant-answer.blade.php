@extends('layouts.applicationcontrol')

@section('content')
    <div class="w-full">
        <div class="p-10 mx-auto flex flex-col justify-center items-center">



            <!--Card 1-->
            <div class="w-full min-h-screen">
                <div class="max-w-screen-md px-10 py-6 mx-4 mt-20 bg-white rounded-lg shadow md:mx-auto border-1">
                  <div class="flex flex-col items-start w-full m-auto sm:flex-row">
                    <div class="flex mx-auto sm:mr-10 sm:m-0">
                      <div class="items-center justify-center w-20 h-20 m-auto mr-4 sm:w-32 sm:h-32">
                        <img alt="profil"
                          src="{{$user->getImageUrl()}}"
                          class="object-cover w-20 h-20 mx-auto rounded-full sm:w-32 sm:h-32" />
                      </div>
                    </div>
                    <div class="flex flex-col pt-4 mx-auto my-auto sm:pt-0 sm:mx-0">
                      <div class="flex flex-col mx-auto sm:flex-row sm:mx-0 ">
                        <h2 class="flex pr-4 text-xl font-light text-gray-900 sm:text-3xl">{{$user->name}}</h2>

                      </div>
                        <div class="flex flex-row gap-4 justify-between mt-2">
                            <i class="bi bi-facebook"> {{$user->facebook}}</i>
                            <i class="bi bi-instagram"> {{$user->instagram}}</i>
                            <i class="bi bi-line"> {{$user->line}}</i>
                        </div>
                    </div>
                  </div>
                  <div class="w-full pt-5">
                    <h1 class="text-lg font-semibold text-gray-800 sm:text-xl">{{$user->first_name. ' '. $user->last_name}}</h1>
                    <p class="text-sm text-gray-500 md:text-base">{{$user->gender}}</p>
                    <p class="text-sm text-gray-800 md:text-base">{{$user->email}}</p>
                  </div>
                </div>
            </div>
            @if($event->questionName != null)
                @foreach($event->questionName as $questionName)
                    <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900 min-w-full">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        src="{{url('storage/' . $event->eventImage->get(0)->event_image)}}"
                                        alt="Michael Gough">{{$event->title}}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                                                                          title="February 8th, 2022">{{$event->event_start_date}}</time></p>
                            </div>


                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">{{$questionName->name}}</p>
                        <div class="flex items-center mt-4 space-x-4">
                            <button type="button"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                Answer Type : {{$questionName->answer_type}}
                            </button>
                        </div>
                    </article>
                        {{-- Text Answer --}}
                        <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900 w-full">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                            class="mr-2 w-6 h-6 rounded-full"
                                            src="{{$user->getImageUrl()}}"
                                            alt="Jese Leos">{{$user->name}}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"></p>
                                </div>


                            </footer>
                            @if($questionName->answer_type == 'Text')
                                @if($questionName->questionAnswer->where('user_id', $user->id)->last()->answer == null)
                                    <p class="text-gray-500 dark:text-gray-400">No answer</p>
                                @else
                                    <p class="text-gray-500 dark:text-gray-400">{{$questionName->questionAnswer->where('user_id', $user->id)->last()->answer}}</p>
                                @endif
                            @elseif($questionName->answer_type == 'File')
                                @if($questionName->questionAnswer->where('user_id', $user->id)->last()->image_path == null)
                                    <p class="text-gray-500 dark:text-gray-400">No answer</p>
                                @else
                                    <img src="{{$questionName->questionAnswer->where('user_id', $user->id)->last()->getFileUrl()}}" class="h-full w-auto object-cover" alt="This User Doesn't submit file">
                                @endif
                            @elseif($questionName->answer_type == 'Video')
                                @if($questionName->questionAnswer->where('user_id', $user->id)->last()->image_path == null)
                                    <p class="text-gray-500 dark:text-gray-400">No answer</p>
                                @else
                                    <video controls>
                                        <source src="{{$questionName->questionAnswer->where('user_id', $user->id)->last()->getFileUrl()}}" type="video/mp4" alt="No answer">
                                    </video>
                                @endif

                            @endif

                        </article>
                @endforeach
            @endif



        </div>
    </div>


    <section>

    </section>


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
   </div>
@endsection
