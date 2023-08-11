

<script src="{{ url('js/kanban/jkanban.min.js') }}"></script>

  <section class="flex flex-col gap-6">

      @if($kanban !=null)
        <div class="w-full flex flex-row justify-between container">  
          <h3 class=" text-3xl  text-black font-semibold "> Kanban :  {{$kanban->name}}</h3>

          <livewire:button-action text="+ Add Post It" idfunc="add_post_it" modal_target="authentication-modal" modal_toggle="authentication-modal" >
          
      
        
          
        </div>
    
      <x-modal-form title="Create Post It" idmodal="authentication-modal" >
        <form class="space-y-6" action="{{ route('kanban.store',['kanban'=>$kanban]) }}" method="POST" >
          @csrf
          <div>
              <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
              <input type="text" name="Title" id="Title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" requeired>
          </div>
          <div>
              <label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
              <textarea id="Description" name="Description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
          </div>
       
          <x-button>Submit</x-button>
        
      </form>
    </x-modal-form>


    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                  <button data-modal-hide="popup-modal" id="confirmDelete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Yes, I'm sure 
                  </button>
                  <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
              </div>
             
          </div>
      </div>
  </div>

    <x-modal-form idmodal="popup-modal-edit" title="Edit Post">
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
  

    <div id="Kanban" class="flex flex-row w-full  justify-center text-center text-black"></div>
    @endif
      
    
    
  </section>


    @if($kanban !=null)
      <script >
          var todo = {!!json_encode($todo)!!};
          var working = {!!json_encode($working)!!};
          var done = {!!json_encode($done)!!};
          // Private functions
          var post_id_delete = null;
          var edit_post_id = null;
          
          var KanbanTest = new jKanban({
              element: "#Kanban",
              gutter: "10px",
              widthBoard: "300px",
              dargItems:true,
        
              itemHandleOptions:{
                enabled: true,
                customHandler:'<div class="item_handle w-full h-64 flex flex-col justify-between bg-pink-300 rounded-lg border border-pink-300 mb-6 py-5 px-4"><div><h4 class="text-gray-800 font-bold mb-3">%title%</h4><p class="text-gray-800 text-sm">%description%</p></div><div><div class="flex items-center justify-between text-gray-800"><p class="text-sm">March 28, 2020</p><div class="flex flex-row gap-2"><button class="w-8 h-8 rounded-full bg-gray-800 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-pink-300   focus:ring-black" aria-label="edit note" role="button" data-modal-target="popup-modal-edit" data-modal-toggle="popup-modal-edit" onClick="editPostIt(this)" data-id="%id%" ><img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/4-by-3-multiple-styled-cards-svg1.svg" alt="edit" /><img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/4-by-3-multiple-styled-cards-svg1dark.svg" alt="edit"  /></button><button   class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-pink-300   focus:ring-black" aria-label="delete note " role="button" data-id="%id%" onclick="deletePostIT(this)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" ><i class="bi bi-trash3" data-id="%id%" ></i></button></div></div></div></div>',
              },
              click: function(el) {
                
                // console.log(el);
                
              },
              // context: function(el, e) {
              //   console.log(el,e);
              // },
              dropEl: function(el, target, source, sibling){
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                console.log(target.parentElement.getAttribute('data-id'));
                var column_name =target.parentElement.getAttribute('data-id');
                var card_id = el.getAttribute('data-eid');

                console.log(el.getAttribute('data-eid'));
                // console.log(target);
                // console.log(source);
                // console.log(sibling);

                $.ajax({
                headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                  },
                type: "POST",
                url:'/kanban/card/update',
                data: JSON.stringify({
                  card_id:card_id,
                  column_name:column_name
                
                }),
                success:function(msg){
                  

                }
              })


              },
              boards: [
                {
                  id: "Todo",
                  title: "To Do",
                  class: "info,good,rounded-t-lg",
              
                  item: todo
                },
                {
                  id: "Working",
                  title: "Working",
                  class: "warning,rounded-t-lg",
                  item: working
                },
                {
                  id: "Done", 
                  title: "Done",
                  class: "success,rounded-t-lg",
                  
                  item: done
                },
     
              ]
            });

            function deletePostIT(e){
              post_id_delete = e.getAttribute('data-id');
       

            }

            function editPostIt(e){
              console.log(e.getAttribute('data-id'));
              var element = KanbanTest.findElement(e.getAttribute('data-id'));
              var title = element.children[0].children[0].children[0].children[0].innerHTML
              var description = element.children[0].children[0].children[0].children[1].innerHTML
              
              var title_edit = document.getElementById('title-edit');
              var description_edit = document.getElementById('description-edit');

              title_edit.value = title;
              description_edit.value = description;
              edit_post_id = e.getAttribute('data-id');

            }

            function confirmEdit(){
              var title_edit = document.getElementById('title-edit');
              var description_edit = document.getElementById('description-edit');
              let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

              $.ajax({
                headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                  },
                type: "POST",
                url:'/kanban/card/edit',
                data: JSON.stringify({
                  card_id:edit_post_id,
                  title:title_edit.value,
                  description:description_edit.value
                }),
                success:function(msg){
                

                }
              })
              

            }

       
       
          

            var removeElements = document.getElementById("confirmDelete");
            removeElements.addEventListener("click", function(e) {
              let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          
              $.ajax({
                headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                  },
                type: "POST",
                url:'/kanban/card/delete',
                data: JSON.stringify({card:post_id_delete}),
                success:function(msg){
                  window.location.reload(true);

                }
              })
           
          
            
            },false);

     

        

      </script>
    @endif
