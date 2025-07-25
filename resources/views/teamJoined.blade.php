@extends('layouts.applicationcontrol')


@section('content')
<!-- Parallax Background -->
<section id="coverImage" class="justify-center items-center  w-full h-[200px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url({{url('https://images.unsplash.com/photo-1691338520808-c0b59d10e117?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80')}})" >
            <div class="flex justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
                <h1 class="text-white text-6xl font-semibold mt-20 mb-10">
                 Team
                </h1>
            </div>
        </section>
<!-- <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1691338520808-c0b59d10e117?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80')] rounded-2xl">
  <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
    Team
  </h1>
</section> -->
    @php
      use Carbon\Carbon;
      $today_date = Carbon::now();
    @endphp
<section class="flex flex-col justify-start container m-4">
    <h1 class=" text-gray-900 font-bold text-2xl ">Team</h1>
    <div class="grid md:grid-cols-3 sm:grid-cols-1 justify-center gap-4 ">

        @if($inTeamEvents != null)
            @foreach($inTeamEvents as $event)
                @if($today_date <= $event->event_end_date )
                <a href="{{route('event.detail.show',['event'=>$event])}}">
                    <livewire:card-event-image title="{{$event->title}}"
                                                image="{{Storage::disk('s3')->url($event->image_poster)}}"
                                                status="Newest"
                                                category="{{$event->category->category_name}}"
                                                description="{{$event->description}}"
                                                timeEnd="{{$event->event_end_date}}"
                                                timeStart="{{$event->event_start_date}}"
                                                location_name="{{$event->location_name}}"
                />
                </a>
                @endif
            @endforeach
        @endif
    </div>
</section>
@endsection
