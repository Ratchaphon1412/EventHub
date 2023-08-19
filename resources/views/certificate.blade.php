@extends('layouts.applicationcontrol')


@section('content')
<!-- Parallax Background -->
<section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')] rounded-2xl">
  <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
    Ceritificate
  </h1>
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

    <tbody class="text-gray-500 ">
    @if($approveEvent->count() > 0)
      @foreach($approveEvent as $event)
      <tr>
        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
          <p class="whitespace-no-wrap">{{$event->id}}</p>
        </td>
        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
          <div class="flex items-center">
            <div class="h-10 w-10 flex-shrink-0">
              <img class="h-full w-full rounded-full" src="" alt="" />
            </div>
            <div class="ml-3">
              <p class="whitespace-no-wrap">{{$event->id}}</p>
            </div>
          </div>
        </td>
        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm justify-center">
          
          <livewire:button-link link="{{route('event.detail.show',['event'=>$event])}}" text="View Event Detail" />

        </td>
        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm flex justify-center">
          
          <livewire:button-link link="{{route('certificate.show',['event'=>$event])}}" text="View Certificate" />

        </td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>

  
</section>

@endsection