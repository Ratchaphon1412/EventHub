@extends('layouts.applicationcontrol')

@section('content')
    <div class="w-full h-full bg-white">
        <p class="text-black font-bold text-3xl ml-6">Applicants</p>
        <section class="flex flex-row flex-wrap m-6 mt-2">
            <div class="flex flex-col flex-wrap w-full">
                @for($i = 0; $i< sizeof($applicants); ++$i)
                    @if($event->userEventApprove()->find($applicants->get($i))->pivot->status == 'pending')
                        <x-card-applicant :event="$event" :applicant="$applicants->get($i)"
                                          approveRoute="approve.update" moreRoute="applicant.answer"
                                          button1="Approve" button2="More">
                        </x-card-applicant>
                    @endif
                @endfor
            </div>
        </section>

        <p class="text-black font-bold text-3xl ml-6">Approved</p>
        <section class="flex flex-row flex-wrap m-6 mt-2">
            <div class="flex flex-col flex-wrap w-full">
                @for($i = 0; $i< sizeof($applicants); ++$i)
                    @if($event->userEventApprove()->find($applicants->get($i))->pivot->status == 'approved')
                        <x-card-applicant :event="$event" :applicant="$applicants->get($i)"
                                          approveRoute="approve.update" moreRoute="applicant.answer"
                                          button1="UnApprove" button2="More">
                        </x-card-applicant>
                    @endif
                @endfor
            </div>
        </section>
    </div>
@endsection
