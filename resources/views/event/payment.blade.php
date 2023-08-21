<section class="flex flex-col justify-center items-center">
    <h1 class="text-4xl text-gray-400 font-bold mb-6 ">
        Budget
    </h1>
    <div>

       @if($payment !=null)
        <embed src="{{url('storage/'.$payment)}}"  class="w-screen h-screen">
        @else
        <p class="text-2xl text-gray-400 font-bold mb-6 ">
            No Payment
        </p>
       @endif
    </div>


</section>