@extends('layouts.applicationcontrol')

@section('content')

<!-- Parallax Background -->
<section id="coverImage" class="justify-center items-center  w-full h-[200px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url({{url('https://images.unsplash.com/photo-1577688723008-7c501eae6f26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')}})" >
            <div class="flex justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
                <h1 class="text-white text-6xl font-semibold mt-20 mb-10">
                  My Owner Event On Event Hub
                </h1>
            </div>
        </section>
<!-- <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  rounded-2xl justify-center items-center bg-[url('https://images.unsplash.com/photo-1577688723008-7c501eae6f26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')]">
  <h1 class="text-black text-5xl font-semibold mt-20 mb-10">
    My Owner Event On Event Hub
  </h1>
</section> -->

<section class="flex flex-col justify-start container m-4">
  <h1 class=" text-gray-900 font-bold text-2xl ">My Owner Event</h1>
</section>


<div class="grid md:grid-cols-3 sm:grid-cols-1 justify-center gap-4 ">
  <div class="group bg-gray-900/30 py-20 px-4 flex flex-col space-y-2 items-center  justify-center cursor-pointer rounded-md hover:bg-gray-900/40 hover:smooth-hover">
    <a href="{{route('event.create.view')}}" class="bg-gray-900/70 text-white/50 group-hover:text-white group-hover:smooth-hover flex w-20 h-20 rounded-full items-center justify-center" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>
    </a>
    <a href="{{route('event.create.view')}}" class="text-white/50 group-hover:text-white group-hover:smooth-hover text-center">
      Create event
    </a>

  </div>
  @if($events != null)
    @foreach ($events as $event)
      <a href="{{route('event.detail.show' , ['event'=>$event])}}">
        <livewire:card-event-image title="{{$event->title}}" image="{{url('storage/'.$event->image_poster)}}" status="Upcomming" category="{{$event->category->category_name}}" description="{{$event->description}}" timeStart="{{$event->evet_start_date}}" timeEnd="{{$event->event_end_date}}" />
      </a>
    @endforeach
  @endif

</div>





@endsection
