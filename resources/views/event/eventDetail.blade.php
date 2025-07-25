
<x-app-layout>

    <main class="flex-col justify-center items-center ">

        <section id="coverImage" class="justify-center items-center overflow-x-hidden bg-fixed w-full  rounded-lg  bg-cover bg-no-repeat " style="background-image:url('{{Storage::disk('s3')->url($event->image_poster)}}')" >
            <div class="flex flex-col justify-center items-center  bg-black rounded-lg relative p-12   w-auto overflow-hidden backdrop-filter backdrop-blur-sm bg-opacity-10  bg-[url('{{Storage::disk('s3')->url($event->image_poster)}}')] ">
                <div class="grid grid-cols-1 md:grid-cols-2 backdrop-filter backdrop-blur-sm bg-opacity-80 -m-8   bg-black text-white  rounded-lg shadow-lg overflow-hidden  w-3/4  drop-shadow-lg">
                    <img src="{{Storage::disk('s3')->url($event->image_poster)}}"  alt="Mountain"
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
                            @can('join',$event)
                            <button id="joinButton"  class="py-2.5 px-5 mr-2 mb-2  text-sm font-medium  focus:outline-none text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Join

                            </button>
                            @endcan

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
                    @auth
                        @can('manageEvent',$event)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="manage-tab" data-tabs-target="#manage" type="button" role="tab" aria-controls="manage" aria-selected="false">Manange</button>
                        </li>
                        @endcan

                        @can('manageEvent',$event)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="team-tab" data-tabs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Team</button>
                        </li>
                        @endcan

                        @can('kanban',$event)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="kanban-tab" data-tabs-target="#kanban" type="button" role="tab" aria-controls="kanban" aria-selected="false">Kanban</button>
                        </li>
                        @endcan

                        @can('question',$event)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="question-tab" data-tabs-target="#question" type="button" role="tab" aria-controls="question" aria-selected="false">Question</button>
                        </li>
                        @endcan

                        @can('manageEventApprove',$event)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="approve-tab" data-tabs-target="#approve" type="button" role="tab" aria-controls="approve" aria-selected="false">Approve</button>
                        </li>
                        @endcan

                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="payment-tab" data-tabs-target="#payment" type="button" role="tab" aria-controls="approve" aria-selected="false">Budget</button>
                        </li>
                    @endauth
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                    <x-events.event-detail-view :event="$event"/>
                </div>
                @can('manageEventApprove',$event)
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approve" role="tabpanel" aria-labelledby="approve-tab">

                    @include('approve-register',['event'=>$event])

                 </div>
                @endcan
                 @can('manageEvent',$event)
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="manage" role="tabpanel" aria-labelledby="manage-tab">

                    @include('event.editEvent',['categorys'=>App\Models\Category::all()])

                </div>
                @endcan
                @can('manageEventTeam',$event)
                    @include('event.teamEvent',['event'=> $event])
                @endcan

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    @include('event.payment',['payment'=>Storage::disk('s3')->url($event->document_payment)])
                 </div>
                 @can('kanban',$event)
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="kanban" role="tabpanel" aria-labelledby="kanban-tab">
                    @include('event.kanban.kanban',['kanban'=>$event->kanban,'todo'=>$event->kanban->columns[0]->cards,'working'=>$event->kanban->columns[1]->cards,'done'=>$event->kanban->columns[2]->cards])
                </div>
                @endcan
                @can('question',$event)
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="question" role="tabpanel" aria-labelledby="question-tab">
                    @include('event.question.create-question',['event'=>$event])
                </div>
                @endcan

            </div>



        </div>



    </main>



    <script type="module">
      import {initTabFlowbite} from "{{ Vite::asset('resources/js/tabflowbite.js') }}"


      const tabElements = [
    {
        id: 'detail',
        triggerEl: document.querySelector('#detail-tab'),
        targetEl: document.querySelector('#detail')
    },
    @can('manageEvent',$event)
    {
        id: 'manage',
        triggerEl: document.querySelector('#manage-tab'),
        targetEl: document.querySelector('#manage')
    },
    @endcan
    @can('manageEvent',$event)
    {
        id:'team',
        triggerEl: document.querySelector('#team-tab'),
        targetEl: document.querySelector('#team')
    },
    @endcan
    @can('kanban',$event)
    {
        id:'kanban',
        triggerEl: document.querySelector('#kanban-tab'),
        targetEl: document.querySelector('#kanban')
    },
    @endcan
    @can('question',$event)
    {
        id:'question',
        triggerEl: document.querySelector('#question-tab'),
        targetEl: document.querySelector('#question')
    },
    @endcan
    @can('manageEventApprove',$event)
    {
        id:'approve',
        triggerEl: document.querySelector('#approve-tab'),
        targetEl: document.querySelector('#approve')
    },
    @endcan

    @can('manageEventApprove',$event)
    {
        id:'approve',
        triggerEl: document.querySelector('#approve-tab'),
        targetEl: document.querySelector('#approve')
    },
    @endcan
    @auth
    {
        id:'payment',
        triggerEl: document.querySelector('#payment-tab'),
        targetEl: document.querySelector('#payment')
    }
    @endauth

]
const options = {

    activeClasses: 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {

    }
};

    let tabs = initTabFlowbite(tabElements, options);




        let sessionTab = {!!json_encode(session()->get('tab'))!!};


        if(sessionTab != null){
            tabs.show(sessionTab);
        }




        let joinButton = document.getElementById('joinButton');
        let userjoin = {!!json_encode($event->userEventApprove()->find(Auth::user()))!!};
        console.log(userjoin);

        let eventQuestion = {!!json_encode($event->question)!!};
        if (userjoin != null){

                if(userjoin.pivot.status=="notcomplate"){
                    joinButton.innerHTML = "Not Complete Answer Question"
                }else{
                    joinButton.innerHTML = "Joined";
                }
        }else{
            joinButton.innerHTML = "Join";
        }



        joinButton.addEventListener('click', function() {
             if(userjoin != null){

               if(userjoin.pivot.status == "notcomplate"){
                window.location.href = "{{route('approve.notComplate',['event'=>$event])}}"
               }else{
                window.location.href = "{{route('approve.unjoin',['event'=>$event])}}";
               }

             }else{
                window.location.href = "{{route('approve.join',['event'=>$event])}}";
             }




        })
    </script>

</x-app-layout>
