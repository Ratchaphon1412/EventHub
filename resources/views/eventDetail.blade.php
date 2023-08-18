
<x-app-layout>
    
    <main class="flex-col justify-center items-center ">
       
        <section id="coverImage" class="justify-center items-center  bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url('{{url('storage/'.$event->image_poster)}}')" >
            <div class="flex flex-col justify-center items-center  bg-black rounded-lg relative p-12  h-full w-auto overflow-hidden backdrop-filter backdrop-blur-sm bg-opacity-10  bg-[url('{{url('storage/'.$event->image_poster)}}')] ">
                <div class="grid grid-cols-1 md:grid-cols-2 backdrop-filter backdrop-blur-sm bg-opacity-80 bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-3/4 drop-shadow-lg">
                    <img src="{{url('storage/'.$event->image_poster)}}"  alt="Mountain" 
                    class="w-full h-full object-cover">
                    <div id="text Title" class="flex justify-center items-center ">
                        <div id="text" class="p-6 flex-col  justify-center items-center space-y-4  gap-4">
                            <div>
                                <p class="text-base">{{$event->category->category_name}}</p>
                                <h2 class="text-3xl  font-black">{{$event->title}}</h2>
                            </div>
                            <div class="flex flex-row ">
                                <i class="bi bi-calendar-week font-bold mr-2"></i>
                                <p class=" leading-tight  text-base ">
                                    {{date('d-m-Y',strtotime($event->registration_start_date))}} - {{date('d-m-Y',strtotime($event->registration_end_date))}}
                                </p>
                            </div>
                            <div class="flex flex-row">
                                <i class="bi bi-geo-alt-fill mr-2"></i>
                                <p class="w-3/4">
                                    {{$event->location_name}}
                                    
                                </p>
                            </div>
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium  focus:outline-none text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Join</button>

                            
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <div class="container mx-auto">
         
            <div class="sticky top-12 z-10 bg-white mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="detail-tab" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Detail</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="#Image" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Image</a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="#Location" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Location</a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="#Contact" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Contact</a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="manage-tab" data-tabs-target="#manage" type="button" role="tab" aria-controls="manage" aria-selected="false">Manange</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="team-tab" data-tabs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Team</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="kanban-tab" data-tabs-target="#kanban" type="button" role="tab" aria-controls="kanban" aria-selected="false">Kanban</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="approve-tab" data-tabs-target="#approve" type="button" role="tab" aria-controls="approve" aria-selected="false">Approve</button>
                    </li>
            
            
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            
                    <x-events.event-detail-view :event="$event"/>
                    

                </div>
                
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="manage" role="tabpanel" aria-labelledby="manage-tab">
                    
                    @include('editEvent',['categorys'=>App\Models\Category::all()])

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="team" role="tabpanel" aria-labelledby="team-tab">
                    <section class="flex flex-col gap-6">

                            <div class="w-full flex flex-row justify-between container">  
                                <h3 class=" text-3xl  text-black font-semibold "> </h3>

                                <livewire:button-action text="+ Add Member" idfunc="add_member" modal_target="authentication-member" modal_toggle="authentication-member" >
   
                            </div>

                            <x-modal-form title="Add Member" idmodal="authentication-member" >
                            <form class="space-y-6" action="" method="POST" >
                                @csrf
                                <div>
                                    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="Email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" requeired>
                                </div>
                            
                                <x-button>Submit</x-button>
                            </form>
                            </x-modal-form>
                            <div id="popup-addMember" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button> 
                                            <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
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
                            <x-modal-form idmodal="popup-modal-edit-addMember" title="Edit Post">
                                <form class="space-y-6" id="editPostIt" >
                                    @csrf
                                    <div>
                                        <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input id="title-edit" type="text" name="Title" id="Title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" requeired>
                                    </div>
                                    <div>
                                        <label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="description-edit"  id="Description" name="Description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                                    </div>

                                    <x-button onclick="confirmEdit()" >Submit</x-button>
                                
                                </form>
                            </x-modal-form>
                            <div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
                    <div class="flex items-center justify-between pb-6">
                        <div>
                        <h2 class="font-semibold text-gray-700">User Accounts</h2>
                        <span class="text-xs text-gray-500">View accounts of registered users</span>
                        </div>
                        <div class="flex items-center justify-between">
        
                        </div>
                    </div>
                    <div class="overflow-y-hidden rounded-lg border">
                        <div class="overflow-x-auto">
                        <table class="w-fit">
                            <thead>
                            <tr class=" bg-blue-600 text-center  text-xs font-semibold uppercase tracking-widest text-white ">
                                <th class="px-5 py-3">ID</th>
                                <th class="px-5 py-3">Full Name</th>
                                <th class="px-5 py-3">User Role</th>
                                <th class="px-5 py-3">Created at</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-500">
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">3</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-full w-full rounded-full" src="/images/-ytzjgg6lxK1ICPcNfXho.png" alt="" />
                                    </div>
                                    <div class="ml-3">
                                    <p class="whitespace-no-wrap">Besique Monroe</p>
                                    </div>
                                </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Administrator</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Sep 28, 2022</p>
                                </td>

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">

                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">7</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-full w-full rounded-full" src="/images/ddHJYlQqOzyOKm4CSCY8o.png" alt="" />
                                    </div>
                                    <div class="ml-3">
                                    <p class="whitespace-no-wrap">James Cavier</p>
                                    </div>
                                </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Author</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Sep 28, 2022</p>
                                </td>

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">12</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-full w-full rounded-full" src="/images/oPf2b7fqx5xa3mo68dYHo.png" alt="" />
                                    </div>
                                    <div class="ml-3">
                                    <p class="whitespace-no-wrap">Elvis Son</p>
                                    </div>
                                </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Editor</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">Sep 28, 2022</p>
                                </td>

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
                        <span class="text-xs text-gray-600 sm:text-sm"> Showing 1 to 5 of 12 Entries </span>
                        <div class="mt-2 inline-flex sm:mt-0">
                            <button class="mr-2 h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Prev</button>
                            <button class="h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Next</button>
                        </div>
                        </div>
                    </div>
                </div>

                    </section>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="kanban" role="tabpanel" aria-labelledby="kanban-tab">
                    @include('kanban',['kanban'=>$event->kanban,'todo'=>$event->kanban->columns[0]->cards,'working'=>$event->kanban->columns[1]->cards,'done'=>$event->kanban->columns[2]->cards])
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approve" role="tabpanel" aria-labelledby="approve-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>


               
            </div>

    

        </div>



    </main>  
</x-app-layout>


