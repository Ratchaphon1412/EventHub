
    <div class="bg-white w-full h-full" xmlns:livewire="http://www.w3.org/1999/html">

        <div class="w-full flex flex-col justify-end items-end">
            <div class="flex flex-col justify-center items-center">
                <label for="toggle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Open or Close Question</label>
                <input id="toggle" type="checkbox" class="toggle toggle-md" checked />
            </div>
        </div>



        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Question</h2>
          </div>
          <form class="mb-6" action="{{ route('question.store', ['event' => $event]) }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                  <label for="comment" class="sr-only">Question</label>
                  <textarea id="comment" rows="6" name="question"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                      placeholder="Write a question..." required></textarea>
              </div>
              <section  class="  ml-3 mb-5">
                <!-- Dropdown menu -->
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option type</label>
                <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Type</option>
                    <option value="Text">Text</option>
                    <option value="File">File</option>
                    <option value="Video">Video</option>

                </select>

            </section>
              <button type="submit"
                  class="inline-flex items-center w-auto px-4 py-2  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                  Submit
              </button>
          </form>

            @if( $event->questionName != null and sizeof($event->questionName) > 0)
                @foreach($event->questionName as $questionName)
          <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">

            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="{{Storage::disk('s3')->url($event->image_poster)}}"
                            alt="{{$event->title}}">{{$event->title}}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"></p>
                </div>

                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                        </path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment1"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownMenuIconHorizontalButton">

                        <li>
                            <form action="{{ route('question.delete', [$event, $questionName]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </footer>
                      <p class="text-gray-500 dark:text-gray-400">
                          {{$questionName->name}}
                      </p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                                  class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <i class="bi bi-file-earmark-medical mr-2" ></i>
                              Required Input {{$questionName->answer_type}}
                          </button>
                      </div>
          </article>
                    @endforeach
            @endif


    </div>


    <script>
        let enableQuestion = {!!json_encode($event->question)!!};
        let toggle = document.getElementById('toggle');

        toggle.checked = enableQuestion;

        toggle.addEventListener('click', function (e) {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                headers: {
                  "Content-Type": "application/json",
                  "Accept": "application/json, text-plain, */*",
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token
                  },
                type: "POST",
                url:'/event/enable/question/',
                data: JSON.stringify({
                    "id": {!!json_encode($event->id)!!},
                    "enable": toggle.checked

                }),
                success:function(msg){

                //   window.location.reload(true);

                }
              })


            console.log(toggle.checked);
        });

    </script>
