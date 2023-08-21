@extends('layouts.applicationcontrol')


@section('content')
<!-- Parallax Background -->

<!-- <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1570610159825-ec5d3823660c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1633&q=80')] rounded-2xl">
  <h1 class="text-black text-5xl font-semibold mt-20 mb-10">
    Ceritificate
  </h1>
</section> -->
<section id="coverImage" class="justify-center items-center  w-full h-[200px] bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url({{url('https://images.unsplash.com/photo-1570610159825-ec5d3823660c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1633&q=80')}})" >
            <div class="flex justify-center items-center backdrop-filter bg-opacity-60 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-full h-full drop-shadow-lg">
                <h1 class="text-white text-6xl font-semibold mt-20 mb-10">
                Ceritificate
                </h1>
            </div>
        </section>
<section class="flex flex-col justify-start container m-4 rounded-lg">
  
  
  <h1 class=" text-gray-900 font-bold text-2xl ">My Certificate</h1>
  <table class="w-full">
    <thead>
      <tr class=" bg-blue-600 text-center  text-xs font-semibold uppercase tracking-widest text-white ">
        <th class="px-5 py-3">ID</th>
        <th class="px-5 py-3">Event Name</th>
        <th class="px-5 py-3">Event Details</th>
        <th class="px-5 py-3">Certificate</th>
      </tr>
    </thead>
    @php
      use Carbon\Carbon;
      $today_date = Carbon::now();
    @endphp
    <tbody class="text-gray-500 ">
    @if(($approveEvents->count() > 0) && ($approveEvents->first()->pivot->status === 'accept'))
      @foreach($approveEvents as $event)
        @if($today_date >= $event->event_end_date )
          <tr>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">{{$event->id}}</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-full w-full rounded-full" src="{{url('storage/'.$event->image_poster)}}" alt="" />
                </div>
                <div class="ml-8">
                  <p class="whitespace-no-wrap">{{$event->title}}</p>
                </div>
              </div>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm justify-center">
              
              <livewire:button-link link="{{route('event.detail.show',['event'=>$event])}}" text="View Event Detail" />

            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm flex justify-center">
              <a href="{{url('storage/'.$event->certificate_file)}}">See this</a>
            </td>
          </tr>
        @endif
      @endforeach
    @endif
    </tbody>
  </table>

  
</section>

@endsection