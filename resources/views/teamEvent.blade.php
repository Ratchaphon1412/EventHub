  <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="team" role="tabpanel" aria-labelledby="team-tab">
    <section class="flex flex-col gap-6">
      <div class="w-full flex flex-row justify-between container">
        <h3 class=" text-3xl  text-black font-semibold "> </h3>

        <livewire:button-action text="+ Add Member" idfunc="add_member" modal_target="authentication-member" modal_toggle="authentication-member">

      </div>
      <x-modal-form title="Add Member" idmodal="authentication-member">
        <form class="space-y-6" action="{{ route('teamEvent.update',['event' => $event]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="@error('Email') border-red-600 bg-red-200 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" requeired>
          </div>

          <x-button>Submit</x-button>
        </form>
      </x-modal-form>
      <div id="popup-addMember" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Post It</h3>
              <button data-modal-hide="popup-addMember" id="confirmDelete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                Yes, I'm sure
              </button>
              <button data-modal-hide="popup-addMember" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>

          </div>
        </div>
      </div>
      <div class="mx-auto w-full px-4 py-8 sm:px-8">
        <div class="flex items-center justify-between pb-6">
          <div>
            <h2 class="font-semibold text-gray-700">User Accounts</h2>
            <span class="text-xs text-gray-500">View accounts of registered users</span>
          </div>
          <div class="flex items-center justify-between">
          </div>
        </div>
        <!-- Table -->
        <div class="overflow-y-hidden w-full rounded-lg border ">
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class=" bg-blue-600 text-center  text-xs font-semibold uppercase tracking-widest text-white ">
                  <th class="px-5 py-3">ID</th>
                  <th class="px-5 py-3">First Name</th>
                  <!-- <th class="px-5 py-3">User Role</th> -->
                  <th class="px-5 py-3">Last Name</th>
                  <th class="px-5 py-3">Reject</th>
                </tr>
              </thead>
              <tbody class="text-gray-500">
                @if($event->userTeam->count() > 0)
                @foreach($event->userTeam as $user)
                <tr>
                  <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                    <p class="whitespace-no-wrap">{{$user->id}}</p>
                  </td>
                  <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-full w-full rounded-full" src="{{$user->profile_photo_url}}" alt="" />
                      </div>
                      <div class="ml-3">
                        <p class="whitespace-no-wrap">{{$user->first_name}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                    <p class="whitespace-no-wrap">{{$user->last_name}}</p>
                  </td>
                  <td>
                    <form action="{{route('teamEvent.delete',['event' => $event,'user' => $user])}}" enctype="multipart/form-data" method="POST"  >
                    @csrf
                    @method('post')  
                    <button type="submit" class="block w-full bg-red-500 text-white font-bold p-2 rounded-lg">
                          reject
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach

                @endif
              </tbody>
            </table>
          </div>
          <!-- <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
            <div class="mt-2 inline-flex sm:mt-0">
              <button class="mr-2 h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Prev</button>
              <button class="h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Next</button>
            </div>
          </div> -->
      </div>
    </section>
  </div>

