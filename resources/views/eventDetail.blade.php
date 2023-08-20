
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
                            <div class="flex flex-row mb-4">
                                <i class="bi bi-geo-alt-fill mr-2"></i>
                                <p class="w-3/4">
                                    {{$event->location_name}}

                                </p>
                            </div>
                            <button id="joinButton"  class="py-2.5 px-5 mr-2 mb-2  text-sm font-medium  focus:outline-none text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Join

                            </button>


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
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="question-tab" data-tabs-target="#question" type="button" role="tab" aria-controls="question" aria-selected="false">Question</button>
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
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approve" role="tabpanel" aria-labelledby="approve-tab">
    
                    @include('approve-register',['event'=>$event])

                 </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="manage" role="tabpanel" aria-labelledby="manage-tab">

                    @include('editEvent',['categorys'=>App\Models\Category::all()])

                </div>
                    @include('teamEvent',['event'=> $event])
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="kanban" role="tabpanel" aria-labelledby="kanban-tab">
                    @include('kanban',['kanban'=>$event->kanban,'todo'=>$event->kanban->columns[0]->cards,'working'=>$event->kanban->columns[1]->cards,'done'=>$event->kanban->columns[2]->cards])
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="question" role="tabpanel" aria-labelledby="question-tab">
                    @include('create-question',['event'=>$event])
                </div>
              
            </div>



        </div>



    </main>
</x-app-layout>


<script>
    let joinButton = document.getElementById('joinButton');
    let userjoin = {!!json_encode($event->userEventApprove()->find(Auth::user()))!!};
    let eventQuestion = {!!json_encode($event->question)!!};
    if (userjoin != null){
            joinButton.innerHTML = "Joined";
    }else{
        joinButton.innerHTML = "Join";
    }

    joinButton.addEventListener('click', function() {
        // window.location.href = "{{route('approve.join',['event'=>$event])}}";

        if(eventQuestion){
            window.location.href = "{{route('question.answer',['event'=>$event])}}"
        }else{
            window.location.href = "{{route('approve.join',['event'=>$event])}}";
        }

    
        
    })
</script>