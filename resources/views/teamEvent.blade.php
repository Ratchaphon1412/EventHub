@extends('layouts.applicationcontrol')

@section('content')

    <!-- Parallax Background -->
    <section class="flex flex-col w-full h-[200px] bg-cover bg-fixed bg-center  justify-center items-center bg-[url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?auto=format&fit=crop&w=880&q=80')]">
      <h1 class="text-white text-5xl font-semibold mt-20 mb-10">
          This is Parallax Effect
      </h1>

   
  </section>
  <main class="container mt-4">
    <section class="container">
      <h1 class="font-bold text-2xl text-gray-600">TeamEvent</h1>
      <hr class="mt-4 mb-4 border-gray-200">
    </section>

    <section>
      <h1 class="font-bold text-xl text-gray-600 mb-2">Active Events กิจกรรมที่กำลังดำเนินการอยู่ในปัจจุบัน</h1>
      <div class="flex flex-wrap">
        @foreach($events as $event)
          <a href="{{route('event.create.edit',['event' => $event])}}">
            <livewire:card-event-image title="{{$event->title}}" image="{{url('storage/'.$event->image_poster)}}" status="Upcomming" category="{{$event->category->category_name}}" description="{{$event->description}}"/>
          </a>
        @endforeach
      </div>

    </section>

  </main>

  
@endsection
