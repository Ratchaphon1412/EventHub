<div>
  <div>
    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 mb-2 "> Approve </h2>

    <table class="w-full">
      <thead>
        <tr class=" bg-blue-600 text-center  text-xs font-semibold uppercase tracking-widest text-white ">
          <th class="px-5 py-3">No.</th>
          <th class="px-5 py-3">First Name</th>
          <th class="px-5 py-3">Last Name</th>
          <th class="px-5 py-3">Status</th>
          <th class="px-5 py-3">Select Status</th>
          @if ($event->question)
          <th class="px-5 py-3"> Question</th>
          @endif

        </tr>
      </thead>
      <tbody class="text-gray-500">
        @if(sizeof($event->userEventApprove) > 0)
            @for($i = 0; $i < $event->userEventApprove->count(); $i++)
                <tr>
                    <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                        <p class="whitespace-no-wrap">{{$i+1}}</p>
                    </td>
                    <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-full w-full rounded-full" src="{{$event->userEventApprove->get($i)->profile_photo_url}}" alt="" />
                            </div>
                            <div class="ml-3">
                                <p class="whitespace-no-wrap">{{$event->userEventApprove->get($i)->first_name}}</p>
                            </div>
                        </div>
                    </td>
                    <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                        <p class="whitespace-no-wrap">{{$event->userEventApprove->get($i)->last_name}}</p>
                    </td>
                    <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                        <p class="whitespace-no-wrap" id="{{"status".$event->userEventApprove->get($i)->id}}">{{$event->userEventApprove->find($event->userEventApprove->get($i)->id)->pivot->status}}</p>
                    </td>


                    <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                        <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " onchange="selectStatus(this)" dataid="{{$event->userEventApprove->get($i)->id}}">
                            <option selected>Choose a Status</option>
                            <option value="pending">Pending</option>
                            <option value="accept">Accept</option>
                            <option value="reject">Reject</option>
                            <option value="notcomplete">Not Complete</option>

                        </select>
                    </td>
                    @if($event->question)
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm flex justify-center">
                            <livewire:button-link link="{{route('applicant.answer', ['event' => $event, 'user' => $event->userEventApprove->get($i)])}}" text="View AnsQuestion" />
                        </td>
                    @endif


                </tr>
            @endfor
{{--        @foreach($event->userEventApprove as $user)--}}
{{--        --}}
{{--        @endforeach--}}

        @endif
      </tbody>
    </table>
    @php
      use Carbon\Carbon;
      $today_date = Carbon::now();
    @endphp

    @if($event->announcement_date <= $today_date)
    <form action="{{route('event.result',['event' => $event])}}" enctype="multipart/form-data" method="POST">
      @csrf
      @method('post')
      <button type="submit" class="block w-full bg-green-900 text-white font-bold p-2 rounded-lg xt-10">
        Announment Who pass
      </button>
    </form>
    @endif


  </div>
</div>

<script>


  function selectStatus(e) {
    console.log(e.value);
    console.log(e.getAttribute("dataid"));

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    $.ajax({
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
      },
      type: "POST",
      url: '/approve/status',
      data: JSON.stringify({
        "user_id": e.getAttribute("dataid"),
        "status": e.value,
        "event_id": {!!json_encode($event->id)!!}

      }),
      success: function(msg) {

        let dataid = document.getElementById("status"+e.getAttribute("dataid"));
        dataid.innerHTML = e.value;




      }
    })




  }
</script>
