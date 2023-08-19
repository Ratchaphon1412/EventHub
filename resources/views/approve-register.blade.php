<div>
    <div>
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 mb-2 "> Approve </h2>

        <table class="w-full">
            <thead>
              <tr class=" bg-blue-600 text-center  text-xs font-semibold uppercase tracking-widest text-white ">
                <th class="px-5 py-3">ID</th>
                <th class="px-5 py-3">First Name</th>
                <th class="px-5 py-3">Last Name</th>
                <th class="px-5 py-3">Status</th>
                <th class="px-5 py-3">Question</th>
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
    
                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                    <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Status</option>
                        <option value="pending">Panding</option>
                        <option value="accept">Accept</option>
                        <option value="reject">Reject</option>
                        <option value="notcomplate">Not Complate</option>
                    
                    </select>
                </td>
                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm flex justify-center">
                  <livewire:button-link link="" text="View AnsQuestion"/>
                </td>
              </tr>
            @endforeach
    
              @endif
            </tbody>
        </table>
    </div>
</div>
